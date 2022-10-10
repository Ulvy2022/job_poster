<template>
<section class="h-screen">
    <div class="container px-6 py-12 h-full">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="w-full" alt="Phone image" />
            </div>
            <div class="md:w-11/12 lg:w-5/12  lg:ml-20  ">
                    <!-- Email input -->
                    <div class="mb-6">
                        <input type="text"
                            v-model="email"
                            class="form-control inline-block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Email address" />
                    </div>

                    <div class=" -mt-4 mb-2" v-if="isEmptyEmail">
                        <div class="flex">
                            <span class="text-red-700">Email cannot be empty</span>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="mb-6 ">
                        <input :type="type"
                            v-model="password"
                            @keyup.enter="signIn()"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Password" />
                    </div>

                    <div class=" -mt-4 mb-2" v-if="isEmptyPassword">
                        <div class="flex">
                            <span class="text-red-700">Password cannot be  empty</span>
                        </div>
                    </div>

                    <div class=" -mt-4 mb-2" v-if="showInvalid">
                        <div class="flex">
                            <span class="text-red-700">{{isInval}}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                            <input type="checkbox"
                                @click="showPassword()"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                id="exampleCheck3" checked />
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                                me</label>
                        </div>
                        <a href="#!"
                            class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">Forgot
                            password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" v-if="!isClickSigIn"
                        @click="signIn()"
                        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                        Sign in
                    </button>
                    <button v-if="isClickSigIn" class="btn loading bg-blue-600 w-full">Sign in</button>

                    <div
                        class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                        <p class="text-center font-semibold mx-4 mb-0">OR</p>
                    </div>

                    <a class="px-7 py-3 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full flex justify-center items-center mb-3  bg-blue-600"
                        @click="signWithGoogle()"
                         href="#!" role="button" data-mdb-ripple="true"
                        data-mdb-ripple-color="light">
                        <!-- google -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="h-5 w-5 fill-white mb-1 mr-5">
                            <path
                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                        </svg>
                        with google
                    </a>
            </div>
        </div>
    </div>
</section>

</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            showInvalid:false,
            email: '',
            password: '',
            type: 'text',
            isClickSigIn: false,
            isInval: 'Invalid email address or password!',
            isEmptyEmail: false,
            isEmptyPassword: false,
        }
    },
    methods: {
        signIn() {
            
            if (!this.email.trim() == '' && !this.password.trim() == '') {
                this.isClickSigIn = !this.isClickSigIn
                this.isEmptyEmail = false
                this.isEmptyPassword = false
                axios.post('http://localhost:8000/api/login/', { email: this.email, password: this.password }).then((res) => {
                    if (res.data.sms == 'Invaliid password') {
                        this.showInvalid = !this.showInvalid
                        this.isClickSigIn = !this.isClickSigIn
                    } else {
                        localStorage.setItem('userId',res.data.id)
                        this.showInvalid = false
                    }
                }).catch(() => {
                    this.isClickSigIn = !this.isClickSigIn
                })
            }
            if (this.email.trim() == '') {
                this.isEmptyEmail  = true
            }
            if (this.password.trim() == '') {
                this.isEmptyPassword = true
            }
            if (this.email.trim() != '') {
                this.isEmptyEmail = false
                this.showInvalid = !this.showInvalid

            }
            if (this.password.trim() != '') {
                this.isEmptyPassword = false
                this.showInvalid = !this.showInvalid

            }
        },
        showPassword() {
            if (this.type == 'text') {
                this.type='password'
            } else {
                this.type = 'text'
            }
        },

        signWithGoogle() {
            axios.get('http://localhost:8000/auth/google').then((res) => {
                console.log(res.data);
            })
        },
 
    }
}

</script>