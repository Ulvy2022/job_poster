<template>
    <div class="w-full bg-gray-200 " style="min-height:89vh;">
        <div class="w-full lg:w-11/12 m-auto p-5">
            <div class="lg:flex  lg:gap-x-10 grid grid-cols-1">
                <!-- side bar -->
                <div class="lg:w-2/4 w-full gap-y-2 " id="sideBar">
                    <!-- billng and plan -->
                    <div class="flex   p-3 gap-2 cursor-pointer  active " @click="showPlanForm" id="showPlanForm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 fill-blue-500">
                            <path
                                d="M168 336C181.3 336 192 346.7 192 360C192 373.3 181.3 384 168 384H120C106.7 384 96 373.3 96 360C96 346.7 106.7 336 120 336H168zM360 336C373.3 336 384 346.7 384 360C384 373.3 373.3 384 360 384H248C234.7 384 224 373.3 224 360C224 346.7 234.7 336 248 336H360zM512 32C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H512zM512 80H64C55.16 80 48 87.16 48 96V128H528V96C528 87.16 520.8 80 512 80zM528 224H48V416C48 424.8 55.16 432 64 432H512C520.8 432 528 424.8 528 416V224z" />
                        </svg>
                        <p class="text-sm">Plan & Billing</p>
                    </div>
                    <!-- job posted -->
                    <div class="flex   p-3 gap-2 cursor-pointer w-full" @click="showJobForm" id="showJobForm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-blue-500">
                            <path
                                d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z" />
                        </svg>
                        <p class="text-sm">Job Posted</p>
                    </div>
                    <!-- contact info -->
                    <div class="flex   p-3 gap-2 cursor-pointer  " @click="showContactForm" id="showContactForm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5 fill-blue-500">
                            <path
                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>
                        <p class="text-sm">Contact Info</p>
                    </div>
                </div>
                <planForm v-if="showPlan" :userSub="userSub" :userPayments="userPayments" />
                <contactForm v-if="showContact" :userInfo="userInfo" @updateUserInfo="updateUserInfo" />
                <jobPosted v-if="showJobPosted" :userJobs="userJobs" />
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import Swal from "sweetalert2";
import planForm from "../../components/planForm/planForm.vue";
import contactForm from "../../components/contactForm/contactForm.vue";
import jobPosted from "../../components/jobPosted/jobPosted.vue"
export default {
    emits: ['updateUserInfo'],
    components: {
        planForm,
        contactForm,
        jobPosted
    },

    data() {
        return {
            userSub: [],
            userInfo: [],
            showPlan: true,
            showContact: false,
            userPayments: [],
            userJobs: [],
            showJobPosted: false,
            // userId: localStorage.getItem("userId"),
        }
    },

    methods: {

        showPlanForm() {
            this.showJobPosted = false;
            this.showContact = false;
            this.showPlan = true;
            document.getElementById('showPlanForm').classList.add("active");
            document.getElementById('showContactForm').classList.remove("active");
            document.getElementById('showJobForm').classList.remove("active");
        },

        showContactForm() {
            this.showJobPosted = false;
            this.showPlan = false;
            this.showContact = true;
            document.getElementById('showPlanForm').classList.remove("active");
            document.getElementById('showContactForm').classList.add("active");
            document.getElementById('showJobForm').classList.remove("active");
        },

        showJobForm() {
            this.showContact = false;
            this.showPlan = false;
            this.showJobPosted = true;
            document.getElementById('showPlanForm').classList.remove("active");
            document.getElementById('showContactForm').classList.remove("active");
            document.getElementById('showJobForm').classList.add("active");
        },

        getUserSub() {
            axios.get("http://localhost:8000/api/userSubInfo/" + localStorage.getItem("userId")).then((response) => {
                this.userSub = response.data;
                console.log(response.data);
            })
        },

        getUserInfo() {
            axios.get("http://localhost:8000/api/user/" + this.userId).then((response) => {
                this.userInfo = response.data[0];
            })
        },

        updateUserInfo(data) {
            axios.put("http://localhost:8000/api/user/" + this.userId, data).then(() => {
                Swal.fire(
                    'Update Success',
                    'Your Information has been updated',
                    'success'
                )
                this.getUserInfo();
            })
        },

        paymentHistory() {
            axios.get("http://localhost:8000/api/payment/" + this.userId).then((res) => {
                this.userPayments = res.data;
            })
        },

        getUserJobs() {
            axios.get("http://localhost:8000/api/jobposter/" + this.userId).then((res) => {
                this.userJobs = res.data;
            })
        }
    },

    mounted() {
        this.paymentHistory();
        this.getUserSub();
        this.getUserJobs();
        this.getUserInfo();
    }

}
</script>


<style scoped>
.active {
    background: white;
    border-left: 2px rgb(39, 39, 238) solid;
}
</style>