<template>
    <div class="w-full bg-gray-200 flex justify-center items-center" style="height:87vh;" id="formReset">
        <div class="lg:w-4/12  h-96 bg-white rounded-md w-11/12">
            <!-- <div class="mt-10"> -->
                <p class="flex justify-start m-auto lg:justify-center w-11/12 text-lg mt-5">Change Your Password</p>
                <div class="relative z-0 bottom-6 top-8  group w-11/12 m-auto lg:top-4">
                    <input  name="floating_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                        :type="type"
                        :class="{ 'border-red-500 focus:border-red-600': isValidateNewPsw, 'focus:border-blue-600': !isValidateNewPsw }"
                        v-model="newPassword" placeholder=" " required />
                    <label for="floating_email"
                        :class="{ 'text-red-500 peer-focus:text-red-500': isValidateNewPsw, 'peer-focus:text-blue-600': !isValidateNewPsw }"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New
                        Password</label>
                    <span class="text-red-500 text-xs" v-if="isValidateNewPsw">Password must be more than 5 letters</span>
                </div>
                <div class="relative z-0 top-16 w-11/12 group m-auto">
                    <input  name="floating_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0  peer"
                        :type="type"
                        :class="{ 'border-red-500 focus:border-red-600': isValidateOldPsw, 'focus:border-blue-600': !isValidateOldPsw }"
                        v-model="oldPassword" placeholder=" " required />
                    <label for="floating_email"
                        :class="{ 'text-red-500 peer-focus:text-red-500': isValidateOldPsw, 'peer-focus:text-blue-600': !isValidateOldPsw }"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Old
                        Password</label>
                    <span class="text-red-500 text-xs" v-if="isValidateOldPsw">Wrong Password</span>
                </div>
                <div class="w-11/12 m-auto mt-24 flex items-center justify-between">
                    <div>
                        <input @click="showPassword()" type="checkbox" checked class="checkbox checkbox-xs" />
                        <span class="ml-2">Show Password</span>
                    </div>
                    <router-link to="/resetPsw">
                        <span class="text-blue-500 hover:underline hover:underline-offset-1">Forget Password?</span>
                    </router-link>
                </div>
                <!-- <div class="flex justify-evenly w-4/5 m-auto mt-24">
                    <span class="ml-2">Hide Password</span>
                    <input @click="showPassword()" type="checkbox" class="toggle toggle-md" checked />
                    <span class="ml-2">Show Password</span>
                </div> -->
                <div class=" w-11/12 m-auto flex justify-start mt-5 lg:justify-center ">
                    <button class="btn btn-outline hover:bg-black hover:text-white cursor-pointer " @click="changePassword()">Change</button>
                </div>
            <!-- </div> -->
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
import axios from "axios";
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            oldPassword: '',
            newPassword: '',
            isValidateNewPsw: false,
            isValidateOldPsw: false,
            type:"text"
            
        }
    },

    methods: {
        validationEditPf(input) {
            if (input.trim() == '' || input.length < 6) {
                return true;
            }
            return false;
        },

        changePassword() {
            this.isValidateOldPsw = false;
            this.isValidateNewPsw = false;
            if (!this.validationEditPf(this.oldPassword) && !this.validationEditPf(this.newPassword)) {      
                    axios.put("http://localhost:8000/api/changePassword/" + localStorage.getItem("userId") + '/', { oldPassword: this.oldPassword, newPassword: this.newPassword }).then((res) => {
                        if (res.data.msg == 'failed') {
                            this.isValidateOldPsw = true
                        } else {
                            Swal.fire({
                                title: 'Your Password changed',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                },
                            })
                            this.$router.push('/profile');
                        }
                    })                 
            }
            else {
                this.isValidateNewPsw = this.validationEditPf(this.newPassword);
            }
        },
        showPassword(){
            if (this.type == "text") {
                this.type = "password"
            } else {
                this.type='text'
            }
        }

    }
}
</script>