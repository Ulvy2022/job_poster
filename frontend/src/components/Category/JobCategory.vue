<template>
    <div class="w-full mt-5 gap-10 overflow-x-hidden">
        <div class="w-full flex justify-start ">
            <p class="w-2/4 text-2xl  ml-2">Latest Jobs</p>
        </div>
        <!-- <router-link to="/job_detail"> -->
        <!-- <div class="lg:w-8/12 md:w-full" v-for="job of allJobs" :key="job" :id="job.id" @click="jobDetails(job.id)"> -->

            <div class="lg:w-8/12 md:w-full">
                <div v-for="job of allJobs" :key="job" :id="job.id" class="flex w-full gap-10 items-center bg-base-100 hover:bg-gray-100 cursor-pointer rounded-box mt-2">
                    <div>
                        <div class="avatar placeholder ml-2">
                            <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                                <span class="text-3xl">L</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-3  w-full">
                        <p class="text-blue-400 text-xl text-ellipsis lg:text-xs">{{job.job_title}}</p>
                        <p class="text-ellipsis mb-1 text-gray-500">{{job.company_name}}</p>
                        <div class="flex lg:gap-24 gap-7">
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5" >
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                <p>5-Nov-2022</p>
                            </div>
                            
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                    <path
                                        d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                                </svg>
                                <p>{{job.post_at}}</p>     
                            </div>

                            <div class="flex">
                                <label for="my-modal-5" class="w-full bg-blue-600 hover:bg-red-700 text-white font-bold py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline">Edit</label>
                                <button @click="deleteJob(job.id)" class="w-full bg-red-600 hover:bg-red-700 ml-2 text-white font-bold py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline">Delete</button>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>

            <input type="checkbox" id="my-modal-5" class="modal-toggle"/>
            <div class="modal">
                <div class="mt-8 lg:w-[40%] w-full p-3 bg-white rounded-lg m-auto">
                    <form @usbmit.prevent="">
                        <h1 class="text-center text-blue-500 mb-1 text-lg">EditJob</h1>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="job-title" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Job Title</label>
                                <input type="text" id="job-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Web Developer" required="">
                            </div>

                            <div>
                                <label for="job-location" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Job Location</label>
                                <input type="text" id="job-location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phnom Penh" required="">
                            </div>

                            <div>
                                <label for="job-type" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Job Type</label>
                                <select id="job-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required="">
                                    <option disabled>Job Type</option>
                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                </select>
                            </div>  

                            <div>
                                <label for="closing-date" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Job Closing Date</label>
                                <input type="date" id="closing-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" >
                            </div>
                        
                            <div>
                                <label for="salary" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Salary(per month)</label>
                                <input type="number" id="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary">
                            </div>

                            <div>
                                <label for="contact-name" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Name</label>
                                <input  type="text" id="contact-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required="">
                            </div>
                            <div>
                                <label for="contact-email" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Email</label>
                                <input type="email" id="contact-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email">
                            </div>

                            <div>
                                <label for="company-name" class="font-semibold block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">Company Name</label>
                                <input  type="text" id="company-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company Name">
                            </div>
                            
                            <div class="mb-1">
                                <label for="job-description" class="font-semibold block mb-1 text-sm text-gray-900 dark:text-gray-300">Job Description</label>
                                <textarea name="" id="password" cols="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job Description" required="">
                                </textarea>
                            </div> 

                            <div class="mb-1">
                                <label for="job-requirement" class="font-semibold block mb-1 text-sm text-gray-900 dark:text-gray-300">Job Requirement</label>
                                <textarea name="" id="password" cols="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job Requirement" required="">
                                </textarea>
                            </div>
                            
                            <div class="modal-action">
                                <label for="my-modal-5" class="text-white w-full bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm sm:m-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancal</label>
                            </div>

                            <div class="modal-action">
                                <button class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm sm:m-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            allJobs:[],
        }
    },

    watch: {
        allJobs(){
           this.getAllJobs()
        }
    },

    methods: {
        getAllJobs() {
            axios.get('http://localhost:8000/api/jobposter').then((res) => {
                this.allJobs = res.data;
            })
        },

        jobDetails(id) {
            localStorage.removeItem('jobId');
            localStorage.setItem('jobId', id);
            this.$router.push('/job_detail');
        },

        deleteJob(id) {
            axios.delete('http://localhost:8000/api/jobposter/' + id)
            .then((res)=>{
                console.log(res.data);
                this.getAllJobs()
            })
        },

        editJob(id) {
            axios.put('http://localhost:8000/api/jobposter/' + id)
            .then((res)=>{
                console.log(res.data);
                this.getAllJobs()
            })
        },
    },

    mounted() {
        this.getAllJobs();
    }
}
</script>

<style scoped>
#card{
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
</style>

