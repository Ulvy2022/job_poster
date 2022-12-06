
<script >
import Swal from "sweetalert2"
import dropDown from "../DropDown/dropwDown.vue"
import axios from "axios"
export default {
    components: {
        dropDown,
    },
    emits: ['valueSelected'],
    data() {
        return {
            checkbox: false,
            allUsers: null,
            selected: 'Option',
            vlaueCheckbox: [],
            search: '',
            numberOfUsers: 0,
            isShowTable: 0,
            img: '',
            fullName: '',
            gender: '',
            phoneNumber: '',
            companyName: '',
            email: '',
            idToUpdate: null,
        }
    },

    methods: {
        updateProfile() {
            if (!this.validationEditPf(this.fullName) && !this.validationEmail(this.email)) {
                var userInfo = {
                    fullName: this.fullName,
                    gender: this.gender,
                    email: this.email,
                    phoneNumber: this.phoneNumber,
                    companyName: this.companyName
                }
                Swal.fire({
                    title: 'Do you want to save the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.put("http://localhost:8000/api/user/" + this.idToUpdate, userInfo)
                            .then((res) => {
                                if (res.data.msg == 'updated') {
                                    Swal.fire('Saved!', '', 'success')
                                    document.getElementById(this.idToUpdate + 'name').textContent = userInfo.fullName
                                    document.getElementById(this.idToUpdate + 'email').textContent = userInfo.email
                                } else {
                                    Swal.fire('Something wrong !', '', 'error')
                                }
                            }).catch((error) => {
                                console.log(error);
                            })
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            }
        },
        getAllUser() {
            axios.get("http://localhost:8000/api/getAllUsers")
                .then((res) => {
                    this.allUsers = res.data
                    this.numberOfUsers = this.allUsers.length
                })
        },
        valueSelected(value) {
            this.selected = value;
        },

        getSpecificUser(id) {
            this.idToUpdate = id
            axios.get('http://localhost:8000/api/getUser/' + id).then((res) => {
                this.img = res.data.img;
                this.fullName = res.data.fullName;
                this.gender = res.data.gender;
                this.email = res.data.email;
                this.address = res.data.address;
                this.phoneNumbers = res.data.phoneNumbers;
                this.company = res.data.company;

            })
        },

        popUpDelete(id) {
            if (id != '') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to restore this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Users has been deleted.',
                            'success'
                        )
                        this.deleteUser(id);
                    }
                })
            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-center',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'warning',
                    title: 'Please select user first!'
                })
            }
        },

        filterUser() {
            for (let user of this.allUsers) {
                var ele = document.getElementById(user.id);
                var elementText = document.getElementById(user.id + 'name').textContent.toLowerCase();
                if (elementText.search(this.search) > -1) {
                    ele.classList.add("animate__animated", "animate__fadeIn")
                    ele.style.display = '';
                } else {
                    ele.classList.remove("animate__animated", "animate__fadeIn")
                    ele.style.display = 'none'
                }
            }
        },

        deleteUser(usersId) {
            for (let id of usersId) {
                this.numberOfUsers -= 1;
                document.getElementById(id).remove();
                axios.delete("http://localhost:8000/api/user/" + id);
            }
        },

        filterBySubscriber() {
            var numberOfDisplay = 0;
            if (this.selected == 'Non Subscribers') {
                for (let user of this.allUsers) {
                    var elNone = document.getElementById(user.id + "subscriber");
                    if (user.subscription != null) {
                        elNone.classList.add("animate__animated", "animate__fadeIn")
                        elNone.style.display = 'none';
                        numberOfDisplay++;
                    } else {
                        elNone.style.display = '';
                    }
                }
            }
            if (this.selected != 'Option') {
                for (let user of this.allUsers) {
                    var element = document.getElementById(user.id);
                    var elementText = document.getElementById(user.id + 'subscriber');
                    if (document.body.contains(elementText)) {
                        if (elementText.textContent.search(this.selected.toLowerCase()) > -1) {
                            element.classList.add("animate__animated", "animate__fadeIn")
                            element.style.display = '';
                            numberOfDisplay += 1;
                        } else {
                            element.classList.remove("animate__animated", "animate__fadeIn")
                            element.style.display = 'none'
                        }
                    }

                }
                this.numberOfUsers = numberOfDisplay;
            } if (this.selected == 'All Subscribers') {
                this.numberOfUsers = this.allUsers.length
                for (let user of this.allUsers) {
                    // eslint-disable-next-line no-redeclare
                    var el = document.getElementById(user.id);
                    if (document.body.contains(el) && user.subscription != null) {
                        el.classList.add("animate__animated", "animate__fadeIn")
                        el.style.display = '';
                    }
                }
            } if (this.selected == 'All Users') {
                this.numberOfUsers = this.allUsers.length
                for (let user of this.allUsers) {
                    // eslint-disable-next-line no-redeclare
                    var el = document.getElementById(user.id);
                    el.classList.add("animate__animated", "animate__fadeIn")
                    el.style.display = '';
                }
            }

        },

        showTable() {
            this.getAllUser();
            this.timeOut = setTimeout(() => {
                this.isShowTable += 1;
                if (this.isShowTable == 2) {
                    clearTimeout(this.timeOut);
                }
            }, 1000);

        },

        validationEditPf(input) {
            if (input.trim() == '' || input.length < 2) {
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
        userDetail(id) {
            // this.$router.push('/userDetail/');
            this.$router.push({ name: 'userDetail', params: { id } });
        },

        setUserToAdmine() {
            console.log(this.idToUpdate);
            axios.put("http://localhost:8000/api/setUserToAdmine/" + this.idToUpdate).then(() => {
                this.getAllUser()
                Swal.fire('Updated', '', 'success');
            }).catch(() => {
                Swal.fire('error!', '', 'success')
            })
        }

    },
    watch: {
        isShowTable() {
            if (this.isShowTable < 2) {
                this.showTable()
            }
        }
    },


    mounted() {
        this.showTable()
        this.getAllUser()

    }
}
</script>


<template>
    <div class=" relative shadow-md sm:rounded-lg lg:w-11/12 lg:m-auto top-7  lg:h-[83vh] overflow-auto"
        style="min-height:87.5vh;">
        <!-- action and search bar -->
        <div class="lg:flex lg:justify-between lg:items-center pb-4 grid gap-y-4  bg-white ">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative w-11/12 m-auto lg:w-1/3">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input
                    class="m-auto w-full block p-3 pl-10  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  capitalize"
                    v-model="search" @keyup="filterUser" placeholder="Search users by name">
            </div>
            <div class="lg:w-1/3  m-auto w-11/12">
                <div class="relative">
                    <dropDown @valueSelected="valueSelected" @click="filterBySubscriber"
                        @deleteUser="popUpDelete(vlaueCheckbox)" />
                </div>
            </div>
            <div
                class="lg:w-1/4 w-4/5   border-gray-400 ml-5 lg:mr-3 flex lg:place-items-end lg:justify-center justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 fill-blue-500" viewBox="0 0 640 512">
                    <path
                        d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                </svg>
                <p class="ml-5 text-lg text-blue-500">{{ numberOfUsers }} Users</p>
            </div>
        </div>

        <!-- end of action and earch bar -->
        <div class="grid grid-cols-1 gap-y-4  rounded-md p-4  w-full mx-auto " v-if="isShowTable < 2">
            <div class=" flex space-x-2 " v-for="user of allUsers" :key="user">
                <div class="rounded-full bg-slate-200 h-14 w-14"></div>
                <div class="flex-1 space-y-3 py-1">
                    <div class="h-4 bg-slate-200 rounded w-24"></div>
                    <div class="">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="h-4 bg-slate-200 rounded "></div>
                            <div class="h-4 bg-slate-200 rounded "></div>
                            <div class="h-4 grid grid-cols-3 gap-x-2 rounded ">
                                <div class="h-4 bg-slate-200 rounded "></div>
                                <div class="h-4 bg-slate-200 rounded "></div>
                                <div class="h-4 bg-slate-200 rounded "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400  animate__animated animate__zoomIn "
            v-show="isShowTable == 2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="hidden"
                                class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subscriber
                    </th>
                    <th scope="col" class="py-3 px-6  text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    v-for="user of allUsers" :key="user" :id="user.id">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-value" :value="user.id" v-model="vlaueCheckbox" type="checkbox"
                                class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                :checked="checkbox">
                            <label for="checkbox-value" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img v-if="user.img != null" class="w-14 h-14 rounded-full object-cover" :src="user.img">
                        <img v-else class="w-14 h-14 rounded-full" src="../../assets/images/user.png">
                        <div class="pl-3">
                            <div class="text-base font-semibold capitalize" :id="user.id + 'name'">{{ user.fullName }}
                            </div>
                            <div class="font-normal text-gray-500" :id="user.id + 'email'">{{ user.email }} </div>
                        </div>
                    </th>
                    <td v-if="user.subscription != null" class="py-4 px-6 capitalize" :id="user.id + 'subscriber'">
                        {{ user.subscription }}
                    </td>
                    <td v-else class="py-4 px-6 capitalize" :id="user.id + 'subscriber'">
                        No
                    </td>
                    <td class="py-4 px-6 flex justify-evenly text-center -mt-5">
                        <label for="my-modal-5" @click="getSpecificUser(user.id)"
                            class=" bg-white text-blue-500 hover:underline hover:underline-offset-auto cursor-pointer">Edit
                            User</label>
                        <label for="" @click="userDetail(user.id)"
                            class=" bg-white text-black hover:underline hover:underline-offset-auto cursor-pointer">User
                            Details</label>
                        <label
                            class="ml-5 bg-white text-red-500 hover:underline  hover:underline-offset-auto cursor-pointer"
                            @click="popUpDelete([user.id])">Delete
                            User</label>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <!-- pop up form for edit user -->
    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <label for="my-modal-5" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <form class="w-full ">
                <div class=" grid grid-cols-2 gap-4 mt-2">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="floating_email" id="floating_email"
                            :class="{ 'border-red-500 focus:border-red-600': validationEditPf(fullName), 'focus:border-blue-600': !validationEditPf(fullName) }"
                            class="capitalize block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                            v-model="fullName" placeholder=" " required />
                        <label for="floating_email"
                            :class="{ 'text-red-500 peer-focus:text-red-500': validationEditPf(fullName), 'peer-focus:text-blue-600': !validationEditPf(fullName) }"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                            name</label>
                        <span class="text-red-500 text-xs" v-if="validationEditPf(fullName)">First name must be more
                            than 2
                            letters</span>

                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            v-model="companyName" placeholder=" " />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Company Name</label>
                    </div>
                </div>
                <div class=" grid grid-cols-2 gap-4 mt-2">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer capitalize"
                            v-model="gender" placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Gender (Male or Female)</label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            v-model="phoneNumber" placeholder=" " />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Phone Number</label>
                    </div>
                </div>
                <div class=" grid grid-cols-1 gap-4 mt-2">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                            :class="{ 'border-red-500 focus:border-red-600': validationEmail(email), 'focus:border-blue-600': !validationEmail(email) }"
                            v-model='email' placeholder=" " required />
                        <label for="floating_email"
                            :class="{ 'text-red-500 peer-focus:text-red-500 ': validationEmail(email), 'text-gray-500 peer-focus:text-blue-600': !validationEmail(email) }"
                            class="peer-focus:font-medium absolute text-sm  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Email</label>
                        <span class="text-red-500 text-xs " v-if="validationEmail(email)">
                            Email must be email format
                        </span>
                    </div>
                </div>
            </form>
            <div class="modal-action flex justify-between">
                <label for="my-modal-5" @click="setUserToAdmine" class="btn">Make as Admin</label>
                <label for="my-modal-5" @click="updateProfile" class="btn">Edit!</label>
            </div>
        </div>
    </div>



    <!-- Put this part before </body> tag -->



</template>