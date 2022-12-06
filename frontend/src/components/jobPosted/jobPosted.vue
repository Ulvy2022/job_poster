<template>
    <div class="w-full  animate__animated animate__fadeIn grid lg:mt-0 mt-10 ml-20 gap-y-10 lg:ml-48"
        v-if="userJobs.length == 0">
        <p class="text-red-400 text-lg lg:ml-10">You don't have any post yet!</p>
        <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
    </div>

    <div class="w-full lg:w-11/12 bg-white h-full lg:p-10 animate__animated animate__fadeIn" v-else>
        <p class="p-3 bg-blue-500 text-white">Your Posted Jobs</p>
        <div class="w-full ">
            <!-- trail -->
            <div class="w-full flex justify-center items-center" v-if="userJobs == null">
                <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
            </div>
            <div class="flex justify-between p-3 bg-blue-500 border-t-2 border-white">
                <p class="text-white">Job Title</p>
                <p class="text-white">Salary/m</p>
                <p class="text-white">Posted at</p>
            </div>
            <div class="w-full bg-white flex justify-between p-3 shadow-sm" v-for="job of userJobs" :key="job">
                <!-- check sign -->
                <div class="flex gap-3 items-center">
                    <p>{{ job.job_title }}</p>
                </div>
                <p v-if="(job.salary != null)">{{ job.salary }}$/m</p>
                <p v-else>N/A</p>
                <p>{{ timestampToDate(job.created_at) }}</p>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: ["userJobs"],
    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        }
    }
}
</script>