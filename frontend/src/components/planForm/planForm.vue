<template>
    <div role="status" v-if="(isShowForm && count == 0)" class="w-full flex justify-center items-end">
        <svg aria-hidden="true" class="mr-2 w-16 h-16 text-white animate-spin dark:text-gray-600 fill-blue-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    <div class="w-full  animate__animated animate__fadeIn grid gap-y-10 lg:mt-0 mt-10 ml-20 lg:ml-48"
        v-if="(userSub.length == 0 && !isShowForm)">
        <p class="text-red-400 text-lg  lg:ml-10">You don't have any plan yet!</p>
        <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
    </div>

    <div class="w-full lg:w-11/12 bg-white h-full lg:p-10 animate__animated animate__fadeIn "
        v-if="(userSub.length > 0 && !isShowForm)">
        <p class="p-3 bg-blue-500 text-white">Your Plan History</p>
        <div class="p-3 bg-blue-500 text-white flex justify-between border-t-2 border-white">
            <p>Status/Name</p>
            <p>Price</p>
            <p>subscribe at</p>
        </div>
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
            <div class="p-3 bg-blue-500 text-white flex justify-between border-t-2 border-white">
                <p>Status/Name</p>
                <p>Price</p>
                <p>subscribe at</p>
            </div>
            <div class="w-full bg-white flex justify-between p-3 shadow-sm " v-for="payment of userPayments"
                :key="payment">
                <div class="flex gap-3 items-center">
                    <svg v-if="(payment.status = 0)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="fill-blue-500 w-5 h-5">
                        <path
                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    <!-- <p>{{ payment.status }}</p> -->
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
    data() {
        return {
            isShowForm: true,
            count: 0,
        }
    },
    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        },

        showForm() {
            setTimeout(() => {
                this.count += 1;
                this.isShowForm = false;
            }, 1500)
        },



    },
    mounted() {
        this.showForm();
    }
}
</script>

