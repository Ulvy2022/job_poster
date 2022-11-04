<template>
    <!-- component -->
    <div class="  overflow-x-auto container  m-auto p-3" style="width:98%">
        <div
            class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
            <div class="flex justify-between">
                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                        <div class="flex">
                            <span
                                class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                        stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <input type="text"
                            class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                            placeholder="Search job by name...">
                    </div>
                </div>
                <p class="flex justify-center place-items-end text-blue-500">{{ userJobs.length }} Posted Jobs</p>
            </div>
        </div>
        <div
            class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Job Title</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Email</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Expired At</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Active</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Created At</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="job of userJobs" :key="job" :id="job.id + 'parent'">

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900 capitalize">{{ job.job_title }}</div>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{ job.contact_email }}</td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{ job.expired_at }}</td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative text-xs">{{ job.active }}</span>
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                            {{ job.post_at }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap  border-b border-gray-500 text-sm leading-5">
                            <!-- The button to open modal -->
                            <label for="my-modal-5" class="btn" @click="oldDate(job.id)">Edit Job{{ job.id }}</label>
                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my-modal-5" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box w-11/12 max-w-5xl">
                                    <label for="my-modal-5"
                                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <div class="grid grid-cols-1">
                                        <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    :class="{ 'border-red-500 focus:border-red-600': validationEditPf(fname), 'focus:border-blue-600': !validationEditPf(fname) }"
                                                    class="capitalize block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                                                    v-model="title" placeholder=" " required />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': validationEditPf(fname), 'peer-focus:text-blue-600': !validationEditPf(fname) }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job
                                                    Title</label>
                                                <span class="text-red-500 text-xs" v-if="validationEditPf(fname)">Job
                                                    Title must be more than 5 letters</span>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="companyName" placeholder=" " />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': companyName.length < 3, 'peer-focus:text-blue-600': companyName.length > 2 }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company
                                                    Name</label>
                                                <span class="text-red-500 text-xs" v-if="companyName.length < 3">Company
                                                    name must be more than 5 letters</span>
                                            </div>
                                        </div>

                                        <div class=" grid grid-cols-2 gap-4">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    :class="{ 'border-red-500 focus:border-red-600': validationEditPf(location), 'focus:border-blue-600': !validationEditPf(location) }"
                                                    class="capitalize block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                                                    v-model="location" placeholder=" " required />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': validationEditPf(location), 'peer-focus:text-blue-600': !validationEditPf(location) }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job
                                                    Location ( City or Province) </label>
                                                <span class="text-red-500 text-xs" v-if="validationEditPf(location)">Job
                                                    Title must be more than 5 letters</span>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="address" placeholder=" " />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': validationEditPf(address), 'peer-focus:text-blue-600': !validationEditPf(address) }"
                                                    class="capitalize peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job
                                                    Job Adress (Street, Khan...)</label>
                                                <span class="text-red-500 text-xs" v-if="validationEditPf(address)">Job
                                                    Address must be more than 5 letters</span>
                                            </div>
                                        </div>
                                        <div class=" grid grid-cols-1 gap-4">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    :class="{ 'border-red-500 focus:border-red-600': validationEmail(email), 'focus:border-blue-600': !validationEmail(email) }"
                                                    class=" block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                                                    v-model="email" placeholder=" " required />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': validationEmail(email), 'peer-focus:text-blue-600': !validationEmail(email) }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contact
                                                    Email</label>
                                                <span class="text-red-500 text-xs" v-if="validationEmail(email)">Contact
                                                    Email must be more than 5 letters</span>
                                            </div>

                                        </div>
                                        <div class=" grid grid-cols-2 gap-4">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="number" name="floating_email" id="floating_email"
                                                    :class="{ 'border-red-500 focus:border-red-600': salary < 100, 'focus:border-blue-600': salary > 100 }"
                                                    class="capitalize block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                                                    v-model="salary" placeholder=" " required />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': salary < 100, 'peer-focus:text-blue-600': salary > 100 }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary
                                                    ($)</label>
                                                <span class="text-red-500 text-xs" v-if="salary < 100">Salary:(</span>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group ">
                                                <Menu as="div" class="relative inline-block text-left w-full">
                                                    <div>
                                                        <MenuButton
                                                            class="capitalize inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                                                            {{ Type }}
                                                            <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5"
                                                                aria-hidden="true" />
                                                        </MenuButton>
                                                    </div>

                                                    <transition enter-active-class="transition ease-out duration-100"
                                                        enter-from-class="transform opacity-0 scale-95"
                                                        enter-to-class="transform opacity-100 scale-100"
                                                        leave-active-class="transition ease-in duration-75"
                                                        leave-from-class="transform opacity-100 scale-100"
                                                        leave-to-class="transform opacity-0 scale-95">
                                                        <MenuItems
                                                            class="absolute right-0 z-10 mt-2 w-full border border-b-2 border-gray-300 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                            <div class="py-1 ">
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="jobType('Part-Time')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                                    Part-Time</a>
                                                                </MenuItem>
                                                                <MenuItem v-slot="{ active }">
                                                                <a @click="jobType('Full-Time')"
                                                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                                                    Full-Time</a>
                                                                </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </div>
                                        </div>
                                        <div class=" grid grid-cols-1 gap-4 mb-5">
                                            <div class="col ">
                                                <div class="box border rounded flex flex-col shadow bg-white">
                                                    <div class="box__title bg-grey-lighter px-3 py-2 border-b">
                                                        <h3 class="text-sm text-grey-darker font-medium">Job
                                                            Requirements</h3>
                                                    </div>
                                                    <textarea class="resize-y rounded-md box_title"
                                                        v-model="requirments"></textarea>
                                                </div>
                                            </div>
                                            <div class="col ">
                                                <div class="box border rounded flex flex-col shadow bg-white">
                                                    <div class="box__title bg-grey-lighter px-3 py-2 border-b">
                                                        <h3 class="text-sm text-grey-darker font-medium">Job Description
                                                        </h3>
                                                    </div>
                                                    <textarea class="resize-y rounded-md "
                                                        v-model="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-action">
                                        <label for="my-modal-5" class="btn" @click="editJob()">Save
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
</script>

<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
    data() {
        return {
            userJobs: [],
            email: '',
            fname: '',
            title: "",
            address: "",
            location: "",
            requirments: '',
            description: '',
            salary: 0,
            Type: 'Job Type',
            companyName: '',
            contactName: '',
            jobId: 0
        }
    },

    methods: {
        oldDate(id) {
            for (let job of this.userJobs) {
                if (job.id == id) {
                    this.jobId = id
                    this.email = job.contact_email;
                    this.address = job.company_address;
                    this.salary = job.salary;
                    this.contactName = job.contact_name;
                    this.companyName = job.company_name;
                    this.location = job.company_location;
                    this.title = job.job_title;
                    this.fname = job.user.fullName;
                    this.Type = job.job_type;
                    this.description = job.job_description;
                    this.requirments = job.job_requirement;
                }
            }

        },

        getUserJobs() {
            axios.get("http://localhost:8000/api/jobposter/" + localStorage.getItem("userId")).then((res) => {
                console.log(res.data);
                this.userJobs = res.data
            })
        },

        jobType(value) {
            this.Type = value;

        },

        validationEditPf(input) {
            if (input.trim() == '' || input.length < 6) {
                return true;
            }
            return false;
        },

        validationEmail(email) {
            if (email.trim() == '' || email.length < 12 || (email.search('@') > email.search('gmail')) || email.search('@') == -1 || email.search('gmail') == -1) {
                return true;
            }
            return false;
        },

        editJob() {
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: "Don't save",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put("http://localhost:8000/api/jobposter/" + this.jobId, {
                        contact_email: this.email,
                        company_address: this.address,
                        salary: this.salary,
                        contact_name: this.contactName,
                        company_name: this.companyName,
                        company_location: this.location,
                        job_title: this.title,
                        job_type: this.Type,
                        job_description: this.description,
                        job_requirement: this.requirments,
                        // company_location = this.location;

                    }).then(() => {
                        this.getUserJobs()
                        Swal.fire('Changes are saved', '', 'success')
                    }).catch((err) => {
                        console.log(err);
                        Swal.fire('Something wrong!', '', 'warning')
                    })
                } else if (result.isDenied) {
                    Swal.fire('Changes canceled', '', 'info')
                }
            })
        }

    },

    mounted() {
        this.getUserJobs();
    }
}
</script>

<style scoped>
:focus {
    outline: none;
}
</style>