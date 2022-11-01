<template>
    <div class="lg:w-1/2 w-full mt-5 gap-10 mb-5 m-auto">
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
            <p class="text-xl text-blue-500 ml-5">Job Posted</p>
        </div>
        <div class="w-full">
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
                    <p class="text-blue-600 text-xl text-ellipsis lg:text-xs word-break">{{ job.job_title }}</p>
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
                                <p>3 days</p>
                            </div>
                        </div>

                        <div class="lg:flex grid gap-y-4 lg:m-0 -ml-4 -mt-12">
                            <button
                                class="w-full bg-blue-600  text-white  py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline">Edit</button>
                            <button type="submit"
                                class="w-full bg-red-600  lg:ml-2 text-white  py-2 px-2 rounded focus:outline-none m-auto focus:shadow-outline">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </router-link> -->
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            allJobs: [],
            fullName: "",
            email: "",
            img: ""
        }
    },

    methods: {
        getUserPost(id) {
            axios.get("http://localhost:8000/api/UserJob/" + id).then((res) => {
                this.allJobs = res.data[0].jobsposter
                this.fullName = res.data[0].fullName
                this.email = res.data[0].email
                this.img = res.data[0].img
            })
        },

        getFirstLetter(words) {
            return words[0];
        }
    },
    mounted() {
        this.getUserPost(localStorage.getItem("jobId"))
    }
}
</script>