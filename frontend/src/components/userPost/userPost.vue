<template>
    <div class="lg:w-2/4 w-full mt-5 gap-10 mb-5 m-auto animate__animated animate__fadeIn">
        <div class="w-full ">
            <th scope="row"
                class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white border-t-2 w-full rounded-2xl">
                <img v-if="img != null" class="w-14 h-14 rounded-full object-cover" :src="img">
                <img v-else class="w-14 h-14 rounded-full" src="../../assets/images/user.png">
                <div class="pl-3">
                    <div class="text-base font-semibold capitalize -ml-14">{{ fullName }}
                    </div>
                    <div class="font-normal text-gray-500">{{ email }} </div>
                </div>
            </th>
        </div>
        <div class="w-full">
            <p class="text-xl text-blue-500">Job Posted</p>
            <div v-for="job of allJobs" :key="job" :id="job.id"
                class="flex w-full gap-10 items-center bg-base-100 hover:bg-gray-100 cursor-pointer rounded-box mt-2 border-2">
                <div>
                    <div class="avatar placeholder ml-2">
                        <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                            <span class="text-3xl uppercase">{{ getFirstLetter(job.company_name) }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-3  w-full">
                    <p class="text-blue-600 text-md text-ellipsis  word-break hover:cursor-pointer hover:underline-offset-auto hover:underline"
                        @click="jobDetails(job.id)">{{
                                job.job_title
                        }}</p>
                    <p class="text-ellipsis mb-1 text-gray-500">{{ job.company_name }}</p>
                    <div class="flex lg:gap-24 gap-7">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2">
                            <div class="flex gap-2 lg:w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5">
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                <p>5-Nov-2022</p>
                            </div>
                            <div class="flex gap-2 lg:w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                    <path
                                        d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z" />
                                </svg>
                                <p v-if="(compareDate(job.created_at) > 0)">{{ compareDate(job.created_at) }} days ago
                                </p>
                                <p v-else>Posted Today</p>
                            </div>
                        </div>

                        <div class="lg:flex grid gap-y-4 lg:m-0 -ml-4 -mt-12">
                            <label for="my-modal-3" @click="getUserPostById(job.id)"
                                class="w-full bg-blue-600 text-white  py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline">
                                Edit
                            </label>

                            <button type="submit"
                                class="w-full bg-red-600 lg:ml-2 text-white  py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline"
                                @click="deleteUserPost(job.id)">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Form for admin edit user post. -->
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal overflow-y-auto" v-for="data of dataToEdit" :key="data">
        <div class="mt-8 lg:w-[40%] w-full p-3 bg-white rounded-lg m-auto">
            <form @submit.prevent="">
                <h1 class="text-center bg-blue-600 rounded p-2 text-white mb-1 text-lg">EDIT JOB</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <p>{{ data.job_title }}</p>
                        <label for="job-title" class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job
                            Title</label>
                        <input v-model="jobTitleUpdate" type="text" id="job-title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Web Developer" required="">
                    </div>

                    <div>
                        <label for="job-location"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job Location</label>
                        <input v-model="jobLocationUpdate" type="text" id="job-location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Phnom Penh or Province" required="">
                    </div>

                    <div>
                        <label for="job-type" class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job
                            Type</label>
                        <select v-model="jobTypeUpdate" id="job-type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Flowbite" required="">
                            <option disabled>Job Type</option>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Training Workshop">Training Workshop</option>
                        </select>
                    </div>

                    <div>
                        <label for="closing-date"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job Closing
                            Date</label>
                        <input v-model="jobCloseUpdate" type="date" id="closing-date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>

                    <div>
                        <label for="salary"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Salary(per
                            month)</label>
                        <input v-model="salaryUpdate" type="number" id="salary"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Salary">
                    </div>

                    <div>
                        <label for="contact-name"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Contact Name</label>
                        <input v-model="contactNameUpdate" type="text" id="contact-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Name" required="">
                    </div>

                    <div>
                        <label for="contact-email"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Contact Email</label>
                        <input v-model="contactEmailUpdate" type="email" id="contact-email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email">
                    </div>

                    <div>
                        <label for="company-name"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Company Name</label>
                        <input v-model="companyNameUpdate" type="text" id="company-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Company Name">
                    </div>
                </div>

                <div class="grid w-full gap-4 mb-6 grid-cols-1">
                    <div class="w-full">
                        <label for="companyAddress"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Company Address</label>
                        <textarea v-model="companyAddressUpdate" name="" cols="30"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Job Address" required="">
                    </textarea>
                    </div>

                    <div class="w-full">
                        <label for="job-description"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job Description</label>
                        <textarea v-model="jobDescriptionUpdate" name="" cols="30"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Job Description" required="">
                    </textarea>
                    </div>

                    <div class="mb-1">
                        <label for="job-requirement"
                            class="font-semibold block text-sm text-gray-900 dark:text-gray-300">Job Requirement</label>
                        <textarea v-model="jobRequirmentUpdate" name="" cols="30"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Job Requirement" required="">
                    </textarea>
                    </div>

                    <div class="grid gap-12 grid-cols-2">
                        <div class="modal-action">
                            <label for="my-modal-3" type="submit"
                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm sm:m-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</label>
                        </div>

                        <div class="modal-action">
                            <label for="my-modal-3" @click="editUserPost(data.id)"
                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm sm:m-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2"
export default {
    data() {
        return {
            allJobs: [],
            fullName: "",
            email: "",
            img: "",
            // data for edit
            jobTitleUpdate: '',
            jobLocationUpdate: '',
            jobTypeUpdate: '',
            jobCloseUpdate: '',
            salaryUpdate: '',
            contactNameUpdate: '',
            contactEmailUpdate: '',
            companyNameUpdate: '',
            companyAddressUpdate: '',
            jobDescriptionUpdate: '',
            jobRequirmentUpdate: '',
            jobIdUpdate: null,
            // Data to update (get only one array which match with id that we clicked to update.)
            dataToEdit: []
        }
    },

    methods: {
        getUserPost() {
            axios.get("http://localhost:8000/api/UserJob/" + this.$route.params.id).then((res) => {
                if (res.data.length > 0) {
                    this.allJobs = res.data[0].jobsposter
                    this.fullName = res.data[0].fullName
                    this.email = res.data[0].email
                    this.img = res.data[0].img
                }

            })
        },

        jobDetails(id) {
            this.$router.push({ name: 'job_detail', params: { id } })
        },
        getUserPostById(id) {
            for (let j of this.allJobs) {
                if (j.id == id) {
                    this.dataToEdit = j
                }
            }
            this.jobTitleUpdate = this.dataToEdit.job_title,
                this.jobLocationUpdate = this.dataToEdit.company_location,
                this.jobTypeUpdate = this.dataToEdit.job_type,
                this.jobCloseUpdate = this.dataToEdit.job_closedate,
                this.salaryUpdate = this.dataToEdit.salary,
                this.contactNameUpdate = this.dataToEdit.contact_name,
                this.contactEmailUpdate = this.dataToEdit.contact_email,
                this.companyNameUpdate = this.dataToEdit.company_name,
                this.companyAddressUpdate = this.dataToEdit.company_address,
                this.jobDescriptionUpdate = this.dataToEdit.job_description,
                this.jobRequirmentUpdate = this.dataToEdit.job_requirement
            this.jobIdUpdate = this.dataToEdit.id
        },
        getFirstLetter(words) {
            return words[0];
        },

        editUserPost() {
            if (this.jobTitleUpdate != '' &&
                this.jobLocationUpdate != '' &&
                this.jobTypeUpdate != '' &&
                this.salaryUpdate != '' &&
                this.contactNameUpdate != '' &&
                this.contactEmailUpdate != '' &&
                this.companyAddressUpdate != '' &&
                this.jobDescriptionUpdate != '' &&
                this.jobRequirmentUpdate != '') {
                var editedData = {
                    job_title: this.jobTitleUpdate,
                    company_location: this.jobLocationUpdate,
                    job_type: this.jobTypeUpdate,
                    job_closedate: this.jobCloseUpdate,
                    salary: this.salaryUpdate,
                    contact_name: this.contactNameUpdate,
                    contact_email: this.contactEmailUpdate,
                    company_name: this.companyNameUpdate,
                    company_address: this.companyAddressUpdate,
                    job_description: this.jobDescriptionUpdate,
                    job_requirement: this.jobRequirmentUpdate,
                }
                Swal.fire({
                    title: 'Do you want to save the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            axios.put("http://localhost:8000/api/jobposter/" + this.jobIdUpdate, editedData)
                                .then((result) => {
                                    if (result.data.msg == 'updated') {
                                        Swal.fire('Saved!', '', 'success')
                                    } else {
                                        Swal.fire('Something wrong !', '', 'error')
                                    }
                                    this.$router.go()
                                    this.getUserPost

                                }).catch((error) => {
                                    console.log(error);
                                })
                        }

                    })
            } else {
                Swal.fire(
                    'Please complete all information before click button "Save"!!!'
                )
            }
        },

        deleteUserPost(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios.delete("http://localhost:8000/api/jobposter/" + id)
                        document.getElementById(id).remove()
                    }
                })
        },
        formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        },

        compareDate(ed) {
            console.log(this.formatDate(new Date(ed)));
            const startDate = this.formatDate(new Date(ed))
            const endDate = this.formatDate(new Date());
            const diffInMs = new Date(endDate) - new Date(startDate)
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            // console.log(diffInDays);
            return diffInDays;
        },


    },

    mounted() {
        this.getUserPost()
        this.getUserPostById();
        this.compareDate();
    }
}
</script>