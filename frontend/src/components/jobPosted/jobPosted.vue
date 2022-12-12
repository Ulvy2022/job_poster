<template>
    <div class="w-full  animate__animated animate__fadeIn grid lg:mt-0 mt-10 ml-20 gap-y-10 lg:ml-48"
        v-if="userJobs.length == 0">
        <p class="text-red-400 text-lg lg:ml-10">You don't have any post yet!</p>
        <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
    </div>

    <div class="w-full lg:w-11/12 bg-white h-full lg:p-10 animate__animated animate__fadeIn" v-else>
        <form class="mb-5 w-11/12 m-auto mt-5 lg:w-full">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    @keyup="filterJobsByName('ll')" v-model="searchValue" placeholder="Search jobs by name..." required>
            </div>
        </form>
        <div class="m-auto w-11/12 lg:w-full lg:flex justify-between mb-3 grid grid-cols-1 gap-y-2">
            <div class="w-full flex items-end gap-2">
                <input @click="getRadionValue('All Jobs')" type="radio" name="radio-4" class="radio radio-accent"
                    checked />
                <p>All Jobs</p>
            </div>
            <div class="w-full flex items-end gap-2">
                <input @click="getRadionValue('Closed Jobs')" type="radio" name="radio-4" class="radio radio-accent" />
                <p>Closed Jobs</p>
            </div>
            <div class="w-full flex items-end gap-2">
                <input @click="getRadionValue('Not Closed Jobs')" type="radio" name="radio-4"
                    class="radio radio-accent" />
                <p>Not Closed Jobs</p>
            </div>
        </div>
        <div class="p-3 bg-blue-500 text-white flex justify-between  items-center">
            <p>Your Posted Jobs</p>

        </div>
        <div class="w-full ">
            <!-- trail -->
            <div class="w-full flex justify-center items-center" v-if="userJobs == null">
                <img class="w-3/5 " src="../../assets/images/undraw_page_not_found_re_e9o6.svg" alt="">
            </div>
            <div class="flex justify-between p-3 bg-blue-500 border-t-2 border-white">
                <p class="text-white">Job Title</p>
                <p class="text-white">Salary/m</p>
                <p class="text-white">Action</p>
            </div>
            <div class="w-full bg-white flex justify-between p-3 shadow-sm" v-for="job of userJobs" :key="job">
                <!-- check sign -->
                <div class="flex justify-between w-full gap-3 items-center"
                    :class="{ 'hidden': !filterJobsByName(job.job_title) || filterbyJobDate(job.status) }">
                    <p>{{ job.job_title }}</p>
                    <p v-if="(job.salary != null)">{{ job.salary }}$/m</p>
                    <p v-else>N/A</p>
                    <p>{{ job.status }}$/m</p>
                    <div class="dropdown dropdown-left dropdown-hover">
                        <img tabindex="0" class=" m-1 w-5 h-5 cursor-pointer dropdown-end"
                            src="../../assets/images/bullet-list.png" alt="">
                        <ul tabindex="0" class="dropdown-content menu  shadow bg-base-100 rounded-sm w-fit">
                            <li @click="deleteJob(job.id)"><a>Delete</a></li>
                            <li @click="closeJob(job.id)"><a>Close</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
    data() {
        return {
            searchValue: '',
            radioValue: ''
        }
    },
    props: ["userJobs"],
    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        },

        getRadionValue(value) {
            this.filterbyJobDate(true);
            this.radioValue = value;
        },

        filterbyJobDate(status) {
            if (this.radioValue != "All Jobs") {
                if (this.radioValue == 'Not Closed Jobs') {
                    return !status;
                } else if (this.radioValue == 'Closed Jobs') {
                    return status;
                } else {
                    return false;
                }
            } else if (this.radioValue == "All Jobs") {
                return false;
            }
        },

        closeJob(id) {
            Swal.fire({
                title: 'Do you want to close this job?',
                showCancelButton: true,
                confirmButtonText: 'Close',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios.put("http://localhost:8000/api/closeJob/" + id).then(() => {
                        Swal.fire('Closed!', '', 'success')
                    }).catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            text: err.data,
                        })
                    })
                }
            })

        },

        filterJobsByName(valueToHS) {
            if (this.searchValue.trim() != '' && valueToHS.toLowerCase().search(this.searchValue.toLowerCase()) > -1) {
                return true;
            } else if (this.searchValue.trim() != '' && valueToHS.toLowerCase().search(this.searchValue.toLowerCase()) == -1) {
                return false;
            } else {
                return true;
            }
        },

        deleteJob(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this job!',
                confirmButtonText: 'Delete',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete("http://localhost:8000/api/jobposter/" + id).then(() => {
                        Swal.fire('Deleted!', '', 'success')
                    }).catch((error) => {
                        Swal.fire(error.data, '', 'error')
                    })

                }
            })
        },
    },
    mounted() {
        this.filterbyJobDate(true);
    }
}
</script>


