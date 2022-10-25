<template>
  <section>
    <div>
        <button @click='showCreate' class="btn bg-blue-500 border-none mt-3">Post Job</button>
        
        <CreateForm>
            <div v-if='isShowCreate' @closeCreate="closeCreate" class="modal-mask ">
                <div class="modal-wrapper w-full top-24">
                    <div class="mt-8 lg:w-[40%] w-full p-3 bg-white rounded-lg m-auto">
                        <form @submit.prevent="">
                            <h1 class="text-center text-blue-500 mb-2 text-lg">CREATE JOB</h1>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="job-title" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job Title</label>
                                    <input v-model="jobTitle" type="text" id="job-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Web Developer" required="">
                                </div>

                                <div>
                                    <label for="job-location" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job Location</label>
                                    <input v-model="jobLocation" type="text" id="job-location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phnom Penh" required="">
                                </div>

                                <div>
                                    <label for="job-type" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job Type</label>
                                    <select v-model="jobType" id="job-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required="">
                                        <option value="Full-Time">Full-Time</option>
                                        <option value="Part-Time">Part-Time</option>
                                    </select>
                                </div>  

                                <div>
                                    <label for="closing-date" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job Closing Date</label>
                                    <input v-model="jobClosedate" type="date" id="closing-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" >
                                </div>
                            
                                <div>
                                    <label for="salary" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Salary(per month)</label>
                                    <input v-model="salary" type="number" id="salary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Salary">
                                </div>

                                <div>
                                    <label for="contact-name" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Name</label>
                                    <input v-model="contactName" type="text" id="contact-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required="">
                                </div>
                                <div>
                                    <label for="contact-email" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Email</label>
                                    <input v-model="contactEmail" type="email" id="contact-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email">
                                </div>

                                <div>
                                    <label for="company-name" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company Name</label>
                                    <input v-model="companyName" type="text" id="company-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Company Email">
                                </div>
                                

                                <div class="mb-2">
                                    <label for="job-description" class="font-semibold block mb-2 text-sm text-gray-900 dark:text-gray-300">Job Description</label>
                                    <textarea v-model="jobDescription" name="" id="password" cols="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job Description" required="">
                                    </textarea>
                                </div> 

                                 <div class="mb-2">
                                    <label for="job-requirement" class="font-semibold block mb-2 text-sm text-gray-900 dark:text-gray-300">Job Requirement</label>
                                    <textarea v-model="jobRequirement" name="" id="password" cols="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job Requirement" required="">
                                    </textarea>
                                </div> 

                                <div class="float-right grid lg:cols-2">
                                    <button @click="closeCreate" class="text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancal</button>
                                    <button @click="createJob" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:mt-2">Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </CreateForm>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import CreateForm from '../slot/generalSlot.vue'
export default {
    components: {
        CreateForm
    },
    data() {
        return {
            userId: '1',
            jobTitle: '',
            jobLocation: '',
            jobType: '',
            jobClosedate: '',
            companyName: '',
            salary: '',
            contactName: '',
            contactEmail: '',
            jobDescription: '',
            jobRequirement: '',
            jobs: [],
            isShowCreate: false,
            expire_date:''
        }
    },

    methods: {
        getJob() {
            axios.get('http://127.0.0.1:8000/api/jobposter')
            .then((response)=>{
                this.jobs = response.data;
            })
        },

        createJob() {
            if (!this.jobTitle.trim()=='' && !this.jobLocation.trim()=='' && !this.jobClosedate.trim()=='' && 
            !this.jobType.trim()=='' && !this.salary=='' && !this.contactName.trim()=='' && 
            !this.contactEmail.trim() == '' && !this.jobDescription.trim() == '' && !this.jobRequirement.trim() == '') {
                var moment = require('moment');
                axios.post('http://127.0.0.1:8000/api/jobposter/',
                    {
                        user_id: this.userId,
                        job_title: this.jobTitle,
                        company_location: this.jobLocation,
                        job_type: this.jobType,
                        job_closedate: this.jobClosedate,
                        company_name: this.companyName,
                        salary: this.salary,
                        contact_name: this.contactName,
                        contact_email: this.contactEmail,
                        job_description: this.jobDescription,
                        job_requirement: this.jobRequirement,
                        post_at: moment("M/D/YYYY"),
                        // expired_at:d
                        // post_at: moment("M/D/YYYY h:mm A")
                    } 
                )
                .then((res)=>{
                    console.log(res.data)
                    this.getJob()
                })
                .catch((err)=>{
                    console.log(err)
                })
            }
            this.isShowCreate = false
        },

        showCreate() {
            this.isShowCreate = true
        },

        closeCreate() {
            this.isShowCreate = false
        }
    },
    computed: {
           expireDate(day) {
                const d = new Date()
                d.setDate(d.getDate() + day)
                return String(d).substring(0, 10) + " " + d.getFullYear();
            }
    },

    mounted() {
        this.getJob()
    }
}
</script>
<style>
</style>