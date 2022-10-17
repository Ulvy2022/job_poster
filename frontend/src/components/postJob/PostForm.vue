<template>
  <section>
    <!-- <div class="text-center m-2">
        <span>Create Job</span>
    </div> -->
    <div class="w-[50%] m-auto"> 
        <form @submit.prevent="">
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
                    <input v-model="jobClosedate" type="text" id="closing-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  
                </div>
                <!-- <div>
                    <label for="website" class="font-semibold block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company Detail</label>
                    <input v-model="companyDetails" type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required="">
                </div> -->
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
                </div>

                <div class="mb-6">
                    <label for="job-description" class="font-semibold block mb-2 text-sm text-gray-900 dark:text-gray-300">Job Description</label>
                    <textarea v-model="jobDescription" name="" id="password" cols="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Job Description" required="">
                    </textarea>
                </div> 

                <div class="float-right">
                    <button @click="closeForm" type="submit" class="text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancal</button>
                    <button @click="createJob" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-2">Submit</button>
                </div>
            </form>
        </div>
  </section>
</template>

<script>
import axios from 'axios'
export default {
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
            jobs: [],
        }
    },

    methods: {
        getJob() {
            axios.get('http://127.0.0.1:8000/api/postjob')
            .then((response)=>{
                this.jobs = response.data;
                console.log(this.jobs)
            })
        },

        createJob(){
            if (!this.jobTitle.trim()=='' && !this.jobLocation.trim()=='' && !this.jobClosedate.trim()=='' && !this.jobType.trim()=='' && !this.salary=='' && !this.contactName.trim()=='' && !this.contactEmail.trim()=='' && !this.jobDescription.trim()==''){
                axios.post('http://127.0.0.1:8000/api/user/postjob',
                    {
                        user_id: this.userId,
                        job_title: this.jobTitle,
                        job_location: this.jobLocation,
                        job_type: this.jobType,
                        job_closedate: this.jobClosedate,
                        company_name: this.companyName,
                        salary: this.salary,
                        contact_name: this.contactName,
                        contact_email: this.contactEmail,
                        job_description: this.jobDescription,
                    }
                )
                
                .catch((err)=>{
                    console.log(err)
                })
            }
        }
    },
    mounted() {
        this.getJob();
    }
}
</script>

<style>

</style>