<template>
    <div class="w-full  animate__animated animate__fadeIn grid gap-y-10 lg:mt-0 mt-10 ml-20 lg:ml-48"
        v-if="userSub.length == 0 || userPayments.length == 0">
        <p class="text-red-400 text-lg  lg:ml-10">You don't have any plan yet!</p>
        <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
    </div>

    <div class="w-full lg:w-11/12 bg-white h-full lg:p-10 animate__animated animate__fadeIn" v-else>
        <p class="p-3 bg-blue-500 text-white">Your Plan History</p>
        <div class="w-full ">
            <!-- subscription -->

            <div class="w-full bg-white flex justify-between p-3 shadow-sm" v-for="sub of userSub" :key="sub">
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
            <!-- billing -->
            <p class="p-3 bg-blue-500 text-white">Your Billing History</p>
            <div class="w-full bg-white flex justify-between p-3 shadow-sm " v-for="payment of userPayments"
                :key="payment">
                <div class="flex gap-3 items-center">
                    <!-- <svg v-if="payment.status = 'failed'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="fill-blue-500 w-5 h-5">
                        <path
                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    <svg v-else-if="payment.status = 'success'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                        class="fill-red-500 w-5 h-5">
                        <path
                            d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z" />
                        </svg> -->
                    <p>{{ payment.status }}</p>
                    <p>{{ payment.payment_option }}</p>
                </div>
                <p>{{ payment.amount }}$</p>
                <p>{{ timestampToDate(payment.created_at) }}</p>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['userSub', 'userPayments'],

    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        }
    },
    mounted() {
        console.log(this.userPayments == {});
    }
}
</script>

