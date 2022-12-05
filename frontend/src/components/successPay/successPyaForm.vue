<template>
    <!-- component -->
    <div class=" flex items-center justify-center">
        <div class="bg-gray-100 mt-10  w-2/5 rounded-md ">
            <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6 animate__rotateIn animate__animated">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <div class="text-center">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Success!</h3>
                <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
                <p> Have a great day! </p>
                <div class="py-10 text-center">
                    <router-link to="" @click="clearLocalStorage" class="bg-green-600 p-3 text-white rounded-sm">
                        GO BACK
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    // data() {
    //     return {
    //         url: window.location.href,
    //     }
    // },
    // watch: {
    //     url() {
    //         this.clearLocalStorage();
    //     }
    // },
    methods: {
        createTransaction() {
            var tranInfo = {
                user_id: localStorage.getItem("userId"),
                tran_id: localStorage.getItem("tran_id"),
                payment_option: "VISA",
                hash: localStorage.getItem("hash"),
                status: 1,
                currency: "USD",
                amount: localStorage.getItem("amount"),
                plan_id: localStorage.getItem("plan_id"),
                subscriber_id: localStorage.getItem("userId"),
            }
            axios.post("http://localhost:8000/api/transaction", tranInfo);
            axios.post("http://localhost:8000/api/subscription", tranInfo)

        },

        clearLocalStorage() {
            localStorage.removeItem("hash", this.hash)
            localStorage.removeItem("amount", this.amount)
            localStorage.removeItem("plan_id", this.plan_id)
            localStorage.removeItem("tran_id", this.tran_id)
            this.$router.push("/");
        }
    },

    mounted() {
        this.createTransaction()
    }
}
</script>