<template>
    <div class="w-full">
        <div class="lg:flex lg:w-11/12 lg:m-auto justify-between">
            <div class="lg:w-2/3 lg:-mt-5">
                <!-- job type -->
                <JobList @selectedValue="selectedValue" :title="jobTitle" :jobList="jobs" />
                <!-- quick link -->
                <JobList @selectedValue="selectedValue" :title="linkTitle" :jobList="quickLink" />
            </div>
            <div class="w-full mt-5 gap-10 overflow-x-hidden ">
                <div class="form-control w-full mb-2">
                    <div class="input-group">
                        <input @keyup="filterJobs(jobName)" v-model="jobName" type="text"
                            placeholder="Search jobs by name..." class="input input-bordered w-full" />
                        <button class="btn btn-square " @click="filterJobs(jobName)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full flex justify-between ">
                    <p class="w-2/4 text-2xl  ml-2">Latest Jobs</p>
                    <p class="w-2/4 text-2xl  ml-2 word-break">{{ selected }}</p>
                </div>
                <div class="lg:w-11/12 w-full">
                    <div v-for="job of allJobs" :key="job" :id="job.id + 'parent'"
                        class="flex w-full gap-10 items-center bg-base-100 hover:bg-gray-100 cursor-pointer rounded-box mt-2">
                        <div>
                            <div class="avatar placeholder ml-2">
                                <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                                    <span class="text-3xl">{{ firstLetter(job.company_name) }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3  w-full">
                            <p class="text-blue-400 text-xl text-ellipsis lg:text-xs" :id="job.id + 'jobTitle'">
                                {{ job.job_title }} Position
                            </p>
                            <p class="text-ellipsis mb-1 text-gray-500">{{ job.company_name }} Company</p>
                            <input type="hidden" :value="job.job_type" :id="job.id + 'jobType'">
                            <div class="flex lg:gap-24 gap-7">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-3">
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-5 w-5 fill-blue-500">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                        <p>5-Nov-2022</p>
                                    </div>
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-5 w-5 fill-blue-500">
                                            <path
                                                d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                                        </svg>
                                        <p>3 days ago</p>
                                    </div>
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-500"
                                            viewBox="0 0 512 512">
                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                        <p class="text-red-500">Closed</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import JobList from "../ListJob/JobList.vue"
import axios from 'axios';
export default {
    emits: ['selectedValue'],
    components: {
        JobList
    },
    data() {
        return {
            jobName: "",
            jobTitle: "Job Category",
            jobs: [],
            quickLink: ['Part-time job', 'Full-time job', 'Training WorkShop'],
            linkTitle: "Quick Links",
            allJobs: [],
            selected: ""
        }
    },

    watch: {
        // allJobs() {
        //     this.getAllJobs()
        // },


    },

    methods: {
        getAllJobs() {
            axios.get('http://localhost:8000/api/jobposter').then((res) => {
                this.allJobs = res.data;
            })
        },
        selectedValue(value) {
            this.selected = value;
            this.filterJobs(value)
        },
        firstLetter(words) {
            return words[0]
        },

        filterJobs(value) {
            for (let job of this.allJobs) {
                var ele = document.getElementById(job.id + 'parent');
                var text = document.getElementById(job.id + "jobTitle").textContent.toLowerCase();
                if (text.search(value.toLowerCase()) != -1) {
                    ele.style.display = ''
                } else {
                    ele.style.display = 'none'
                }
            }
        },

        jobDetails(id) {
            localStorage.removeItem('jobId');
            localStorage.setItem('jobId', id);
            this.$router.push('/job_detail');
        },

        deleteJob(id) {
            axios.delete('http://localhost:8000/api/jobposter/' + id)
                .then((res) => {
                    console.log(res.data);
                    this.getAllJobs()
                })
        },

        getAllJobsTitle() {
            this.jobs = []
            axios.get("http://localhost:8000/api/jobTitle").then((res) => {
                for (let value of res.data) {
                    this.jobs.push(value.job_title)
                }
            })
        }
    },

    mounted() {
        this.getAllJobs();
        this.getAllJobsTitle()
    }
}
</script>

<style scoped>
#card {
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
</style>

