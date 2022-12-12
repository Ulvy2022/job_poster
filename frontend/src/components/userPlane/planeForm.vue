<template>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto ">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Planning</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Choose your favourite plan</p>
                <!-- <div class="flex mx-auto border-2 border-indigo-500 rounded overflow-hidden mt-6">
                    <button class="py-1 px-4 bg-indigo-500 text-white focus:outline-none">Monthly</button>
                    <button class="py-1 px-4 focus:outline-none">Annually</button>
                </div> -->
            </div>
            <div class="flex flex-wrap w-full items-center  lg:grid lg:grid-cols-2">
                <div class="p-4 w-full " v-for="(plan, index) in typePlane" :key="plan">
                    <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium">START</h2>
                        <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none capitalize"
                            @click="subName(plan.name)">
                            {{
                                    plan.name
                            }}
                        </h1>
                        <p class="flex items-center text-gray-600 mb-2" v-for="benfits of feature_benifits[index]"
                            :key="benfits">
                            <span
                                class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>{{ benfits }}
                        </p>
                        <p class="flex items-center text-gray-600 mb-2">
                            <span
                                class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>Price {{ plan.postpaid }}$/m
                        </p>
                        <button :id="plan.id" @click="getPrice(plan.postpaid, plan.id, plan.name)"
                            class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full  focus:outline-none hover:bg-blue-500 rounded">
                            Buy Now
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="aba-modal-content">
        <form method="POST" target="aba_webservice"
            action="https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/purchase"
            id="aba_merchant_request" name="aba_merchant_request">
            <input type="hidden" name="req_time" :value="req_time" id="req_time">
            <input type="hidden" name="merchant_id" value="ec002497" id="merchant_id">
            <input type="hidden" name="api_version" value="v1">
            <input type="hidden" name="hash" id="hash" :value="hash">
            <input type="hidden" name="tran_id" id="tran_id" :value="tran_id">
            <input type="hidden" name="amount" :value="amount">
            <input type="hidden" name="continue_success_url" value="http://localhost:8080/successpay">
            <input type="hidden" value="true" name="is_plugin_js">
        </form>
    </div>
</template>

<script>
import Swal from "sweetalert2"
import axios from "axios";
export default {
    data() {
        return {
            typePlane: null,
            link: 'https://buy.stripe.com/test_5kA6sjfSWdSUcwgeUW',
            feature_benifits: [
                ['Post 1 job for 15 days'],
                ['Post 3 jobs for 15 days'],
                ['Post 10 jobs for 30 days'],
                ['Unlimited post jobs for 30 days'],
            ],
            hash: "",
            amount: 0,
            tran_id: '',
            wordsList: "",
            req_time: '',
            paywayScript: '',
            plan_id: 0,
        }
    },

    methods: {

        createTransaction() {
            var tranInfo = {
                user_id: 2,
                tran_id: this.tran_id,
                payment_option: "VISA",
                hash: this.hash,
                status: 1,
                currency: "USD",
                amount: this.amount,

            }
            axios.post("http://localhost:8000/api/transaction", tranInfo);
        },

        callAbaForm() {
            setTimeout(function () {
                // eslint-disable-next-line no-undef
                AbaPayway.checkout();
            }, 1000);
            localStorage.removeItem("hash")
            localStorage.removeItem("amount")
            localStorage.removeItem("plan_id")
            localStorage.removeItem("tran_id")

            localStorage.setItem("hash", this.hash)
            localStorage.setItem("amount", this.amount)
            localStorage.setItem("plan_id", this.plan_id)
            localStorage.setItem("tran_id", this.tran_id)

        },
        userTrail() {
            axios.post("http://localhost:8000/api/trail", { subscriber_id: localStorage.getItem('userId'), plan_id: this.plan_id }).then(() => {
                Swal.fire(
                    'Success',
                    'Your Trail was success',
                    'success'
                )
            })
        },

        getHasCode() {
            axios.get("http://localhost:8000/api/hash/" + this.amount).then((res) => {
                this.hash = res.data;
                this.callAbaForm();
            }).catch((err) => {
                console.log(err);
            })
        },

        randomize() {
            return this.wordsList[Math.floor(Math.random() * (this.wordsList.length))];
        },

        getTranId() {
            axios.get("http://localhost:8000/api/getTranID").then((res) => {
                this.tran_id = res.data
            })
        },

        getPrice(price, id, name) {
            this.plan_id = id;
            this.amount = price;
            if (name.toLowerCase() == "trail") {
                this.userTrail()
            } else {
                this.getHasCode();
            }

        },

        getTimestamp() {
            axios.get("http://localhost:8000/api/timestamp").then((res) => {
                this.req_time = res.data;
            })
        },


    },
    mounted() {
        axios.get('http://localhost:8000/api/features').then((res) => {
            this.typePlane = res.data;
            this.getTranId();
            this.getTimestamp();
        })
        const recaptchaScript = document.createElement("script");
        recaptchaScript.setAttribute(
            "src",
            "https://checkout.payway.com.kh/plugins/checkout2-0.js"
        );
        document.head.appendChild(recaptchaScript);
    }
}
</script>
