<template>
    <div class="w-full lg:flex justify-center mt-10">
            <ul class="steps steps-vertical mb-5">
                <li class="step step-primary">Input Email</li>
                <li class="step " :class="{'step-primary':step2}">Input Verify Code</li>
                <li class="step" :class="{'step-primary':step3}">Input new password</li>
            </ul>
            <div class="lg:w-3/4">
                    <div class="w-full lg:flex justify-center ">
                        <p class="w-full lg:w-1/3  p-3 drop-shadow-lg shadow-lg text-blue-400 text-center rounded-lg mb-5">{{text}}</p>
                    </div>
                    <!-- step 1 -->
                    <div class="relative w-full flex justify-center items-center" v-if="!step1Form">
                        <input autocomplete="off" id="email" name="email" type="text"
                            @keyup.enter="sendVerifyCode()"
                            class="peer placeholder-transparent h-12 w-11/12 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                            v-model="email"
                            placeholder="Email address" />
                        <label for="email"
                            class="ml-5 lg:ml-16 absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                            Address</label>
                    </div>
                    <div class="w-full flex justify-center items-center mt-5" v-if="!step1Form">
                        <button @click="checkVerifyCode" v-if="!ifClickSendCode"
                            class="btn  sm:btn-sm md:btn-md lg:btn-md md:ml-5 bg-gray-400">Get Code</button>
                        <button @click="checkVerifyCode" v-else
                            class="btn loading  sm:btn-sm md:btn-md lg:btn-md md:ml-5 bg-gray-400 outline-hidden">Getting Code</button>
                    </div>

                    <!-- step 2 -->
                    <div class="relative w-full flex justify-center items-center" v-if="step2Form">
                        <input autocomplete="off" id="code" name="code" type="text" @keyup.enter="checkVerifyCode()"
                            class="peer placeholder-transparent h-12 w-11/12 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                            v-model="verifyCode" placeholder="Verify Code" />
                        <label for="code"
                            class="ml-5 lg:ml-16  absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Verify Code</label>
                    </div>
                    <div class="w-full flex justify-center items-center mt-5" v-if="step2Form">
                        <button @click="checkVerifyCode" v-if="!ifClickSendCode"
                            class="btn   sm:btn-sm md:btn-md lg:btn-md md:ml-5 bg-gray-400">Verify Code</button>
                        <button @click="checkVerifyCode" v-else
                            class="btn loading   sm:btn-sm md:btn-md lg:btn-md md:ml-5 bg-gray-400 outline-hidden">Verify Code</button>
                    </div>

                    <!-- step 3 -->
                <div class="relative w-full flex justify-center items-center lg:mb-7" v-if="step3Form">
                    <input autocomplete="off" id="password" name="password" type="text" @keyup.enter="resetNewPsw()"
                        class="peer placeholder-transparent h-12 w-11/12 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                        v-model="newPsw" placeholder="Email address" />
                    <label for="password"
                        class="ml-5 lg:ml-16  absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">New password</label>
                </div>
                <div class="relative w-full flex justify-center items-center mb-5" v-if="step3Form">
                    <input autocomplete="off" id="password" name="password" type="text" @keyup.enter="resetNewPsw()"
                        class="peer placeholder-transparent h-12 w-11/12 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                        v-model="confirmPsw" placeholder="Email address" />
                    <label for="password"
                        class="ml-5 lg:ml-16  absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm password</label>
                </div>
                    <div class="w-full flex justify-center items-center mt-5"  v-if="step3Form">
                        <button @click="resetNewPsw" v-if="!ifClickSendCode" class="btn   sm:btn-sm md:btn-md lg:btn-md  md:ml-5 bg-gray-400">Submit</button>
                        <button @click="resetNewPsw" v-else  class="btn loading sm:btn-sm md:btn-md lg:btn-md  md:ml-5 bg-gray-400 outline-hidden">Submit</button>
                    </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            newPsw: '',
            confirmPsw:'',
            text:'Input your email to get verify code',
            verifyCode:'',
            email: '',
            ifClickSendCode: false,
            step1: false,
            step2: false,
            step3: false,
            step4: false,
            step1Form: false,
            step2Form: false,
            step3Form: false,
            step4Form: false,
            userId:null,
        }
    },

    methods: {
        sendVerifyCode() {
            this.ifClickSendCode = !this.ifClickSendCode;
            if (this.email.trim() != '') {       
                axios.post('http://localhost:8000/api/sendCode/' + this.email).then(() => {
                    this.step1 = true;
                    this.step2 = true;
                    this.step2Form = true;
                    this.step1Form = true;
                    this.text = 'Input your verify code'
                    this.ifClickSendCode = false
                    Swal.fire({
                        icon: 'info',
                        text: 'Please check your email to get verify code!'
                    });
                }).catch((err) => {
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        text: 'Wrong email!'
                    });
                    this.ifClickSendCode = false
                })
            }
        },

        checkVerifyCode()
        {
            this.ifClickSendCode = !this.ifClickSendCode;
            if (this.email.trim() != '') {
                axios.get('http://localhost:8000/api/userBy/' + this.email).then((res) => {
                    this.userId = res.data.id
                    this.ifClickSendCode = true
                    this.ifClickSendCode = false
                    if (res.data.verify_code ==  this.verifyCode) {
                        this.step2Form = false;
                        this.step3Form = true;
                        this.step3 = true
                      
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'Wrong verify code!'
                        });
                    }
                })
            }
        },

        resetNewPsw() {
            if (this.newPsw == this.confirmPsw) {
                axios.put('http://localhost:8000/api/resetPsw/' + this.userId, { newPassword: this.newPsw }).then(() => {
                    Swal.fire({
                        icon: 'success',
                        text: 'Password reseted!'
                    });
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    text: 'Confirm password must be the same as New password!'
                });
            }
        }
    }
}
</script>
