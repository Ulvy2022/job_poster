<template>

    <div class="bg-gray-100 animate__animated animate__fadeIn">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400 ml-3 " style="height:51vh;">
                        <div class="image overflow-hidden ">
                            <img class="h-60 w-auto mx-auto" v-if="img == null && role == 'Admine'"
                                src="../../assets/images/software-engineer.png" />
                            <img class="h-60 w-auto mx-auto" v-else-if="img != null" :src="img" />
                            <img class="h-60 w-auto mx-auto" v-else-if="img == null && gender == 'F'"
                                src="../../assets/images/woman.png" />
                            <img class="h-60 w-auto mx-auto" v-else-if="img == null && gender == 'M'"
                                src="../../assets/images/profile.png" />
                            <img class="h-60 w-auto mx-auto" v-else-if="img == null && gender == 'Other'"
                                src="../../assets/images/user.png" />
                        </div>
                        <label class="block ">
                            <span class="sr-only">Upload Picture</span>
                            <input type="file" @change="onFileChange"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </label>

                    </div>
                    <!-- End of profile card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-72">
                    <!-- Profile tab -->
                    <div class="bg-white p-5 shadow-sm rounded-sm w-full ">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700 ">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Full Name</div>
                                    <div class="px-4 py-2">{{ fname }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2 " v-if="gender != null">{{ gender }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Phone Number</div>
                                    <a class="text-blue-800 hover:underline hover:underline-offset-3 lg:mr-24 mr-7 hover:text-blue-500 tooltip"
                                        :href="'tel:+855' + phoneNumber" v-if="phoneNumber != null"
                                        :data-tip="'Click to call ' + fname">{{ phoneNumber }}</a>
                                    <div class="px-4 py-2" v-else>....</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Company Name</div>
                                    <div class="px-4 py-2" v-if="companyName != null">{{ companyName }}</div>
                                    <div class="px-4 py-2" v-else>....</div>

                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800 hover:underline hover:underline-offset-3 tooltip"
                                            :href="'mailto:' + email" :data-tip="'Click to mail to ' + fname">{{ email
                                            }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" w-full flex justify-start items-start ">
                            <!-- The button to open modal -->
                            <label for="my-modal-3" class="btn modal-button lg:mt-16 lg:mb-2">Edit Profile</label>
                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                            <div class="modal w-full" id="formEdit">
                                <div class="modal-box lg:w-3/5 max-w-5xl w-11/12">
                                    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2" @click="getUserData(), showBtnProgress = false,
                                    showBtnSave = false, showBtnSaved = false">✕</label>
                                    <h3 class="text-lg font-bold mb-4">Edit your profile </h3>
                                    <!-- form edit profile user -->
                                    <form @submit.prevent="hideFormEditPf" class="w-full ">
                                        <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    :class="{ 'border-red-500 focus:border-red-600': validationEditPf(fname), 'focus:border-blue-600': !validationEditPf(fname) }"
                                                    class="capitalize block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                                                    v-model="fname" placeholder=" " required />
                                                <label for="floating_email"
                                                    :class="{ 'text-red-500 peer-focus:text-red-500': validationEditPf(fname), 'peer-focus:text-blue-600': !validationEditPf(fname) }"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                                                    name</label>
                                                <span class="text-red-500 text-xs" v-if="validationEditPf(fname)">First
                                                    name must be more than 2 letters</span>

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
                                        <div class="flex justify-between items-baseline">
                                            <div>
                                                <button type="submit"
                                                    class="  text-white flex px-12 py-3 bg-gray-600 rounded-md"
                                                    v-if="!showBtnSave" @click="updateProfile()"> Save</button>
                                                <button type="submit"
                                                    class="btn bg-gray-600 text-white loading px-7 py-3 rounded-md"
                                                    v-if="showBtnProgress">Saving</button>
                                                <button type="button" v-if="showBtnSaved"
                                                    class="text-white bg-gray-600 px-5 py-3  rounded-md grid grid-cols-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 ml-4  fill-white" viewBox="0 0 512 512">
                                                        <path
                                                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                    </svg>
                                                    Saved
                                                </button>
                                            </div>
                                            <p @click="this.$router.push('/changePassword')"
                                                class="text-sm hover:underline hover:underline-offset-1 text-blue-500 cursor-pointer">
                                                Change your password?</p>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import axios from "axios"
export default {
    data() {
        return {
            showBtnProgress: false,
            showBtnSave: false,
            showBtnSaved: false,
            img: '',
            fname: '',
            lname: '',
            gender: '',
            phoneNumber: '',
            companyName: '',
            bd: '',
            email: '',
            address: '',
            newPassword: '',
            oldPassword: '',
            role: ''
        }
    },
    methods: {
        getUserData() {
            axios.get('http://localhost:8000/api/getUser/' + localStorage.getItem("userId")).then((res) => {
                this.img = res.data.img;
                this.fname = this.capitalize(res.data.fullName)
                this.gender = res.data.gender;
                this.email = res.data.email;
                this.address = res.data.address;
                this.phoneNumber = res.data.phoneNumber;
                this.companyName = res.data.companyName;
                this.role = res.data.role;
            })
        },
        capitalize(words) {
            return words[0].toUpperCase() + words.substring(1, words.length).toLowerCase();
        },

        onFileChange(e) {
            const file = e.target.files[0];
            this.img = URL.createObjectURL(file);
            this.updateImg(file)
        },

        updateProfile() {
            if (!this.validationEditPf(this.fname) && !this.validationEmail(this.email)) {
                this.showBtnSave = !this.showBtnSave;
                this.showBtnProgress = !this.showBtnProgress
                var userInfo = {
                    fullName: this.fname,
                    gender: this.gender,
                    email: this.email,
                    phoneNumber: this.phoneNumber,
                    companyName: this.companyName
                }
                axios.put("http://localhost:8000/api/user/" + localStorage.getItem('userId') + '/', userInfo).then((res) => {
                    if (res.data.msg == 'updated') {
                        this.showBtnSaved = !this.showBtnSaved
                        this.showBtnProgress = !this.showBtnProgress
                        this.showBtnSave = true
                        location.reload()
                    }
                }).catch(() => {
                    this.getUserData()
                })
            }
        },

        updateImg(file) {
            var formData = new FormData();
            formData.append('img', file);
            formData.append('_method', "PUT");
            axios.post('http://localhost:8000/api/updateImg/' + localStorage.getItem('userId') + '/', formData).then(() => {
                location.reload()
            })
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
        }

    },

    mounted() {
        this.getUserData()
    }
}
</script>