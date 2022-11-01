<template>
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
                <span class="text-red-500 text-xs" v-if="validationEditPf(fname)">First name must be more than 2
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
</template>


<script >
import axios from "axios"
export default {
    props: ['userInfo'],
    data() {
        return {
            img: '',
            fname: '',
            lname: '',
            gender: this.userInfo.gender, 
            phoneNumber: this.userInfo.phoneNumbers,
            companyName: this.userInfo.company,
            email: this.userInfo.email,
            address: this.userInfo.address,
        }
    },
    watch: {
        email: function() {
            this.getUserData()
        }  
    },

    methods: {
        getUserData() {
            console.log(this.userInfo);
            this.gender = this.userInfo.gender,
            this.fullName = this.userInfo.fullName,
            this.email = this.userInfo.email,
            this.address = this.userInfo.address,
            this.phoneNumbers = this.userInfo.phoneNumbers,
            this.companyName = this.userInfo.company
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


}
</script>