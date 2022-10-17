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
                </div>
                
                <!-- <label class="mb-4 font-semibold text-gray-900 dark:text-white">Subject Requirement</label>
                <div class="flex flex-row w-full">
                    <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="vue-checkbox" type="checkbox" value="Vue Js" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="vue-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Vue JS</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="react-checkbox" type="checkbox" value="React" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="react-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="angular-checkbox" type="checkbox" value="Angular" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="angular-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="laravel-checkbox" type="checkbox" value="Laravel" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="laravel-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                            </div>
                        </li>
                    </ul>
                    <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="html-checkbox" type="checkbox" value="HTML" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="html-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">HTML</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="node-checkbox" type="checkbox" value="Node Js" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="node-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Node Js</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="c++-checkbox" type="checkbox" value="C++" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="c++-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">C++</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="c#-checkbox" type="checkbox" value="C#" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="c#-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">C#</label>
                            </div>
                        </li>
                    </ul>
                    <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="tailwind-checkbox" type="checkbox" value="Tailwind" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="tailwind-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Tailwind</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="boostrap-checkbox" type="checkbox" value="Boostrap" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="boostrap-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Boostrap</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="english-checkbox" type="checkbox" value="English" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="english-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">English</label>
                            </div>
                        </li>
                        <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input name="subjects[]" id="mysql-checkbox" type="checkbox" value="mySQL" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="mysql-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">mySQL</label>
                            </div>
                        </li>
                    </ul>
                </div> -->
                

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
            // companyDetails: '',
            salary: '',
            contactName: '',
            contactEmail: '',
            jobDescription: '',
            // subjects: [],
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
                        // company_details: this.companyDetails,
                        salary: this.salary,
                        contact_name: this.contactName,
                        contact_email: this.contactEmail,
                        // subjects: this.subjects,
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