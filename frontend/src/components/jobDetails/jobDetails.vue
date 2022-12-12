<template>
    <div class="grid w-full text-lg p-3 ">
        <div class="grid w-full ">
            <p class="w-full p-3 bg-blue-400 text-white">Announcement description</p>
            <p class="p-3 text-base">{{ jobDetails.job_description }}</p>
        </div>
        <div class="grid">
            <p class="w-full p-3 bg-blue-400 text-white">Announcement position</p>
            <b class="text-xl p-3  capitalize">{{ jobDetails.job_title }}</b>
            <div class="grid text-base">
                <!-- location -->
                <div class="flex p-3 justify-start items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-6 w-6">
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                    </svg>
                    <p class="ml-2 capitalize">Location : {{ jobDetails.company_location }}</p>
                </div>
                <div class="flex p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 w-6">
                        <path
                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <p class="ml-2" v-if="jobDetails.created_at != null">Posted at : {{
                            tsToReadable(jobDetails.created_at)
                    }}</p>
                    <p class="ml-2" v-else>Posted at : N/A</p>
                </div>

                <div class="flex p-2 justify-start items-end">
                    <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <rect x="8" y="15" width="2" height="2" />
                    </svg>

                    <p class="ml-1" v-if="(jobDetails.job_closedate != null)">Close Date :
                        {{ tsToReadable(jobDetails.updated_at) }}
                    </p>
                    <p class="ml-1" v-else>Close Date :
                        N/A
                    </p>

                </div>

                <!-- schedule -->
                <div class="flex p-3 justify-start items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 w-6 ">
                        <path
                            d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z" />
                    </svg>
                    <p class="ml-2 capitalize">Schedule : {{ jobDetails.job_type }}</p>
                </div>
                <div class="flex p-3 justify-start items-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
                        <path
                            d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84.1 96c0-11.1-9-20.1-20.1-20.1s-20.1 9-20.1 20.1v6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.8 4.1c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9l0 0 0 0 0 0 0 0c-2.2-.8-4.3-1.5-6.3-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1V416c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1v-5.5c5.4-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4V224z" />
                    </svg>
                    <p class="ml-2" v-if="(jobDetails.salary != null)">Salary : {{ (jobDetails.salary) }}$/m
                    </p>
                    <p class="ml-2">Salary : N/A</p>
                </div>
            </div>

            <!-- job information -->
            <div class="grid w-full text-base">
                <p class="w-full p-3 bg-blue-400 text-white">Application Information</p>
                <!-- job requirement -->
                <div class="grid p-3">
                    <b class="text-lg">Job Requirements</b>
                    <p class="text-sm"> {{ jobDetails.job_requirement }} </p>
                </div>
            </div>

            <!-- apply cv -->
            <div class="grid w-full text-base">
                <p class="w-full p-3 bg-blue-400 text-white">Apply CV</p>
                <img v-if="cvToDisplay != null" :src="cvToDisplay" alt="">
                <label class="block p-3 ">
                    <p class=" font-bold text-lg">Interesting with this position?</p>
                    <p>Drop your CV below now!</p>

                    <span class="sr-only">Upload CV</span>
                    <input type="file" @change="onFileChange"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        accept=".pdf" />
                    <img src="" alt="">
                    <button type="submit" class="p-3 mt-5 mb-5 bg-blue-500 text-white rounded-md"
                        @click="updateImg">Apply Now</button>
                </label>
            </div>
        </div>
    </div>

</template>

<script>
import axios from "axios";
import Swal from "sweetalert2"
export default {
    data() {
        return {
            jobDetails: [],
            jobId: localStorage.getItem('jobId'),
            cv: '',
            cvToDisplay: ''
        }
    },

    methods: {
        getJobDetails() {
            axios.get('http://localhost:8000/api/jobposterId/' + this.$route.params.id).then((res) => {
                this.jobDetails = res.data
            })
        },

        tsToReadable(timestamp) {
            return new Date(timestamp).toString().substring(4, 15)
        },

        onFileChange(e) {
            const file = e.target.files[0];
            this.cvToDisplay = URL.createObjectURL(file);
            this.cv = file
        },

        updateImg() {
            var formData = new FormData();
            formData.append('cv', this.cv);
            formData.append('jobs_poster_id', this.$route.params.id);
            formData.append('user_id', this.jobDetails.user_id);
            formData.append('_method', "POST");
            if (this.cv != '') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to delete it",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Apply'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post('http://localhost:8000/api/cv', formData).then((res) => {
                            if (res.data.msg == 'success') {
                                Swal.fire(
                                    'Applied!',
                                    'Your CV has been Applied.',
                                    'success'
                                )
                            }
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'warning',
                    text: 'Please Drop Your Cv!',
                })
            }
        },


    },
    mounted() {
        this.getJobDetails()
    }



}
</script>