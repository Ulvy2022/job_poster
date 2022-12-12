<template>

    <div class="lg:w-7/12 w-full mt-5 gap-10 mb-5 m-auto bg-white h-full lg:p-10 animate__animated animate__fadeIn">
        <p class="p-3 bg-blue-500 text-white">Subscriptions</p>
        <div class="w-full ">
            <!-- trail -->
            <div class="w-full flex justify-center items-center" v-if="userSubs == null">
                <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
            </div>
            <div class="w-full bg-white flex justify-between p-3 shadow-sm" v-for="sub of userSubs" :key="sub">
                <!-- check sign -->
                <div class="flex gap-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-blue-500 w- h-5">
                        <path
                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>

                    <p>{{ sub.name }}</p>
                </div>
                <p>{{ sub.postpaid }}$/m</p>
                <p>{{ timestampToDate(sub.created_at) }}</p>
            </div>

        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            userSubs: []
        }
    },
    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        },

        getAllUserSUb() {
            axios.get("http://localhost:8000/api/userSubInfo/" + localStorage.getItem("subId")).then((res) => {
                this.userSubs = res.data
                console.log(res.data);
            })
        },

    },

    mounted() {
        this.getAllUserSUb()
    }
}
</script>

