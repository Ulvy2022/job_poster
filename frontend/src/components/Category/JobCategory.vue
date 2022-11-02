<template>
    <div class="w-full">
        <div class="lg:flex lg:w-4/5 lg:m-auto justify-between">
            <div class="lg:w-2/3 mt-5 mb-2">
                <!-- job type -->
                <JobList @selectedValue="selectedValue" :title="jobTitle" :jobList="jobs" />
                <!-- quick link -->
                <JobList @selectedValue="selectedValue" :title="linkTitle" :jobList="quickLink" />
                <!-- company list -->
                <JobList @selectedValue="selectedValue" :title="comapnyTitle" :jobList="companyList" />
            </div>
            <div class="w-full mt-10 gap-10 overflow-x-hidden ">
                <div class="form-control w-full mb-2">
                    <div class="input-group">
                        <input @keyup="filterJobs(jobName)" v-model="jobName" type="text"
                            placeholder="Search jobs by name..." class="input input-bordered w-full" />
                        <button class="btn btn-square " @click="getAllJobs(), jobName = '', selected = ''">
                            <svg class="h-6 w-6 fill-white " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full flex justify-between ">
                    <p class="w-2/4 text-xl  ml-2">Latest Jobs</p>
                    <p class="w-2/4 text-xl  ml-2 word-break">{{ selected }}</p>
                </div>
                <div class="lg:w-11/12 w-full">
                    <div v-for="job of allJobs[currentPage]" :key="job" :id="job.id + 'parent'"
                        class="flex w-full gap-10 items-center bg-base-100 hover:bg-gray-100 cursor-pointer rounded-box mt-2">
                        <div>
                            <div class="avatar placeholder ml-2">
                                <div class="bg-gray-500 text-neutral-content rounded-full w-16">
                                    <span class="text-3xl">{{ firstLetter(job.company_name) }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3  w-full">
                            <p class="text-blue-400 text-md text-ellipsis capitalize" :id="job.id + 'jobTitle'">
                                {{ job.job_title }} Position
                            </p>
                            <p class="text-ellipsis text-sm text-gray-500 " :id="job.id + 'company'">
                                {{ job.company_name }}
                                Company</p>
                            <p class="text-ellipsis mb-1 text-gray-500 capitalize hidden" :id="job.id + 'jobType'">
                                {{ job.job_type }}
                            </p>
                            <div class="flex lg:gap-24 gap-7">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-y-1">
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-5 w-5 fill-blue-500">
                                            <path
                                                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                        </svg>
                                        <p class="text-sm">5-Nov-2022</p>
                                    </div>
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-5 w-5 fill-blue-500">
                                            <path
                                                d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                                        </svg>
                                        <p class="text-sm">3 days ago</p>
                                    </div>
                                    <div class="flex gap-2 lg:w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-red-500"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                        <p class="text-red-500 text-sm">Closed</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-center">
                        <paginationPage @previousPage="previousPage" @nextpage="nextPage" :allPages="allPages"
                            :currentPage="currentPage" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import JobList from "../ListJob/JobList.vue"
import paginationPage from "../pagination/paginationPage.vue"
import axios from 'axios';
export default {
    emits: ['selectedValue'],
    components: {
        JobList,
        paginationPage
    },
    data() {
        return {
            jobName: "",
            jobTitle: "Job Category",
            jobs: [],
            quickLink: ['Part-time job', 'Full-time job', 'Training WorkShop'],
            linkTitle: "Quick Links",
            allJobs: [],
            selected: "",
            comapnyTitle: "Company Name",
            companyList: [],
            currentPage: 0,
            allPages: 0,
            tenJobPerPage: []
        }
    },


    methods: {
        previousPage() {
            this.selected = '';
            this.jobName = '';
            if (this.currentPage > 0) {
                this.currentPage -= 1;
                this.filterJobs(this.selected)
            }
        },

        nextPage() {
            this.selected = '';
            this.jobName = '';
            if (this.currentPage < this.allJobs.length - 1) {
                this.currentPage += 1;
                this.filterJobs(this.selected)
            }
        },

        getAllJobs() {
            this.allJobs = []
            var j = []
            var index = 0;
            axios.get('http://localhost:8000/api/jobposter').then((res) => {
                j = res.data;
                for (let i = 0; i < j.length; i++) {
                    index += 1;
                    this.tenJobPerPage.push(j[i])
                    if (index > 19) {
                        this.allJobs.push(this.tenJobPerPage);
                        this.tenJobPerPage = []
                        index = 0;
                    }
                }
                if (index > 0) {
                    this.allJobs.push(this.tenJobPerPage);
                }
                this.allPages = this.allJobs.length;
            })
        },
        selectedValue(value) {
            this.selected = value;
            if (value.toLowerCase().search("company") != -1) {
                this.filterJobByCompanyName(value)
            } else {
                this.filterJobs(value);
            }
        },

        firstLetter(words) {
            if (words != null) {
                return words[0]
            }
        },

        filterJobs(value) {
            if (this.selected != '' || this.jobName != '') {
                for (let job of this.allJobs[this.currentPage]) {
                    var ele = document.getElementById(job.id + 'parent');
                    var text = document.getElementById(job.id + "jobTitle").textContent.toLowerCase();
                    var jobType = document.getElementById(job.id + "jobType").textContent.toLowerCase();
                    if (text.search(value.toLowerCase()) != -1) {
                        ele.style.display = ''
                    }
                    else if (jobType.search(value.toLowerCase()) != -1) {
                        ele.style.display = ''
                    }
                    else {
                        ele.style.display = 'none'
                    }
                }
            } else {
                for (let job of this.allJobs[this.currentPage]) {
                    var el = document.getElementById(job.id + 'parent');
                    el.style.display = ''
                }
            }
        },

        filterJobByCompanyName(value) {
            for (let job of this.allJobs[this.currentPage]) {
                var ele = document.getElementById(job.id + 'parent');
                var text = document.getElementById(job.id + "company").textContent.toLowerCase();
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
        },

        getAllCompanyName() {
            this.companyList = []
            axios.get("http://localhost:8000/api/companyName").then((res) => {
                for (let value of res.data) {
                    this.companyList.push(value.company_name + " Company")
                }
            })
        }
    },

    mounted() {
        this.getAllJobs();
        this.getAllJobsTitle();
        this.getAllCompanyName();
    }
}
</script>

<style scoped>
#card {
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
</style>

