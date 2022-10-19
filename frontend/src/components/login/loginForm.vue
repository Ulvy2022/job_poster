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
                            <span class="text-red-700">Password cannot be empty</span>
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
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Show password</label>
                        </div>
                        <!-- <button class="text-blue-600" @click="show_register">
                            Register
                        </button> -->

                        <a 
                             @click="forgotPassword"
                            class="cursor-pointer hover:underline hover:underline-offset-1 text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out">Forgot
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

                    <googLoginForm/>
            </div>
        </div>

        <Register-Form v-if='is_show' @close_register="close_register">
            <div class="modal-mask">
                <div class="modal-wrapper w-[45%]  absolute top-44 right-14">
                   <form class="bg-blue-500 shadow-2xl rounded px-8 pt-6 pb-8 mb-4">
                        <span class="text-light-600">REGISTER</span>
                        <div class="mb-2 flex w-full">
                            <div class="flex flex-col w-full">
                                <input type="text" placeholder="First Name" required class="peer shadow appearance-none border mr-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="firstName">

                                <p class="invisible peer-invalid:visible text-red-700 font-light">
                                    Please enter your FirstName
                                </p>
                            </div>

                            <div class="flex flex-col ml-2 w-full">
                                <input type="text" placeholder="Last Name" required class="peer shadow appearance-none border mr-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="lastName">

                                <p class="invisible peer-invalid:visible text-red-700 font-light">
                                    Please enter LastName
                                </p>
                            </div>

                        </div>

                        <div class="flex flex-col w-full">
                            <select required class="peer bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="gender">
                                <option value="Gender" class="text-gray-200" disabled>Gender</option>
                                <option value="Male" class="text-gray-700">Male</option>
                                <option value="Female" class="text-gray-700">Female</option>
                            </select>  

                            <p class="invisible peer-invalid:visible text-red-700 font-light">
                                Please choose your gendar
                            </p>
                        </div>
                        
                        <div class="flex flex-col w-full">
                            <input type="tel" placeholder="Phone Number" required class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" v-model="phoneNumber">

                            <p class="invisible peer-invalid:visible text-red-700 font-light">
                                Please enter your Phone Number
                            </p>
                        </div>
                       
                        <div class="flex flex-col w-full">
                            <input  type="email" placeholder="Email" required class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" v-model="emailUser">

                            <p class="invisible peer-invalid:visible text-red-700 font-light">
                                Please enter your Email
                            </p>
                        </div>
                        
                        <div class="flex flex-col w-full">
                            <input required class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" v-model="passwordUser">
                            <p class="invisible peer-invalid:visible text-red-700 font-light">
                                Please enter your password
                            </p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button @click="register" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none m-auto focus:shadow-outline" type="button">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Register-Form>
    </div>
</section>

</template>

<script>
import axios from "axios"
import registerForm from '../slot/generalSlot.vue';
import googLoginForm from "../google/googleLogin.vue"
export default {
    components: {
        'Register-Form': registerForm,
        googLoginForm
    },

    data() {
        return {
            is_show: false,
            showInvalid:false,
            email: '',
            password: '',
            type: 'text',
            isClickSigIn: false,
            isInval: 'Invalid email address or password!',
            isEmptyEmail: false,
            isEmptyPassword: false,
            emailUser: '',
            passwordUser: '',
            role: 'user',

        }
    },
    methods: {
        show_register(){
            this.is_show= true;
        },

        register() {
            if (!this.firstName.trim() == "" && !this.lastName.trim() == "" && !this.gender.trim() == "" && !this.phoneNumber == "" && !this.emailUser.trim() == "" && !this.passwordUser.trim() == ""){
                let body = {
                    firstName:this.firstName,
                    lastName:this.lastName,
                    gender:this.gender,
                    role: this.role,
                    phoneNumber: this.phoneNumber,
                    email: this.emailUser,
                    password: this.passwordUser,
                }
                axios.post("http://127.0.0.1:8000/api/user/register", body)
                this.is_show = false;
            }
            
            this.firstName = "";
            this.lastName = "";
            this.gender = "";
            this.phoneNumber = "";
            this.email = "";
            this.password = ""
        },

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
                        this.showInvalid = false;
                        this.$router.push('/home')
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

        forgotPassword() {
            this.$router.push('/resetPsw');
        }
    },

}

</script>