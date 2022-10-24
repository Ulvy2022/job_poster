<template>
<section class="h-screen bg-gray-200">
    <div class="container px-6 py-12 h-full ">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <!-- <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="w-full" alt="Phone image" />
            </div> -->
            <div class="w-full lg:w-5/12  lg:ml-20  bg-white p-5 rounded-lg ">
                <p class="w-full flex justify-center items-center text-2xl text-blue-500 mb-4">Welcome back</p>
                    <!-- email  -->
                    <!-- <div class="relative mb-2">
                        <input id="email"
                         v-model="email"
                            class="w-full rounded px-3 border border-gray-300 pt-5 pb-2 focus:border-blue-700 focus:ring-1 focus:ring-blue-700 focus:outline-none input active:outline-none"
                            type="text" autofocus>
                        <label for="email" class="label absolute mt-2 ml-3 leading-tighter text-gray-600 text-base cursor-text" >Email
                        </label>
                    </div> -->
                    <!-- email -->
                    <div class="relative mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <input type="text" id="email-address-icon"
                          v-model="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email">
                    </div>

                    <div class="mb-mt-4 mb-2">
                        <div class="flex">
                            <span v-if="isEmptyEmail" class="text-red-700">Email cannot be empty</span>
                        </div>
                    </div>
             
                <!-- password -->
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-500"  viewBox="0 0 448 512">
                            <path
                                d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                        </svg>
                    </div>
                    <input :type="type" id="email-address-icon"
                        v-model="password"
                        @keyup.enter="signIn()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Password">
                </div>
        

                    <div class=" -mt-4 mb-2">
                        <div class="flex" v-if="isEmptyPassword">
                            <span class="text-red-700">Password cannot be empty</span>
                        </div>
                    </div>

                    <!-- <div class=" -mt-4 mb-2" v-if="showInvalid">
                        <div class="flex">
                            <span class="text-red-700">{{isInval}}</span>
                        </div>
                    </div> -->

                    <div class="flex justify-between items-center mb-6 mt-3">
                  
                        <div class="flex items-start" >
                            <div class="flex items-center h-5" @click="showPassword()">
                                <input id="remember"  type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Show password</label>
                            </div>
                        </div>
                        <button class="hidden lg:block text-blue-600 cursor-pointer hover:underline hover:underline-offset-1 " @click="show_register">
                            Sign Up
                        </button>
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
             
                    <p class="text-sm font-light lg:hidden mt-3  text-gray-500 dark:text-gray-400"
                     @click="show_register()">
                        Don’t have an account yet? <a href="#"
                            class="font-medium text-blue-500 hover:underline hover:underline-offset-2 dark:text-primary-500">Sign up</a>
                    </p>
                    <button v-if="isClickSigIn" class="btn loading bg-blue-600 w-full">Sign In</button>
                
                    <div
                        class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                        <p class="text-center font-semibold mx-4 mb-0">OR</p>
                    </div>

                    <googLoginForm @create-account="is_show= true;" />
            </div>
        </div>

        <Register-Form v-if='is_show' @close_register="close_register">
            <div class="modal-mask">
                <div class="modal-wrapper w-full top-24">
                   <form class="bg-gray-100 shadow-2xl lg:w-[50%] w-full m-auto mt-32 rounded px-8 pt-6 pb-8 mb-4">
                        <span class="text-light-600">REGISTER</span>
                        <div class="mb-2 flex w-full">
                            <div class="flex flex-col w-full">
                                <input @change='checkInput(firstName)' type="text" placeholder="First Name" required class="peer shadow appearance-none border mr-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="firstName">
                                <p v-if="firstName==''" class="text-red-700 font-light">
                                    Please enter your FirstName
                                </p>
                            </div>

                            <div class="flex flex-col ml-2 w-full">
                                <input @change="checkInput(lastName)" type="text" placeholder="Last Name" required class="peer shadow appearance-none border mr-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="lastName">

                                <p v-if='lastName == "" ' class="text-red-700 font-light">
                                    Please enter LastName
                                </p>
                            </div>

                        </div>

                        <div class="flex flex-col w-full">
                            <select @change="checkInput(gender)" required class="peer bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="gender">
                                <option value="Gender" class="text-gray-200" disabled>Gender</option>
                                <option value="Male" class="text-gray-700">Male</option>
                                <option value="Female" class="text-gray-700">Female</option>
                            </select>  

                            <p v-if='gender == "" ' class="text-red-700 font-light">
                                Please choose your gendar
                            </p>
                        </div>
                        
                        <div class="flex flex-col w-full">
                            <input  @change="checkInput(phoneNumber)" placeholder="Phone Number"  class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" v-model="phoneNumber">

                            <p v-if='phoneNumber == "" ' class="text-red-700 font-light">
                                Please enter your Phone Number
                            </p>
                        </div>
                       
                        <div class="flex flex-col w-full">
                            <input  @change="checkInput(emailUser)" type="email" placeholder="Email" required class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" v-model="emailUser">

                            <p v-if='emailUser == "" ' class="text-red-700 font-light">
                                Please enter your Email
                            </p>
                        </div>
                        
                        <div class="flex flex-col w-full">
                            <input @change="checkPassword(passwordUser)" required class="peer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" v-model="passwordUser">
                            <p v-if='isNoPass' class="text-red-700 font-light">
                                Please enter your password
                            </p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button @click="register" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none m-auto focus:shadow-outline" type="button">
                                Register
                            </button>
                            <googLoginForm/>
                            <button @click='is_show=false' class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none m-auto focus:shadow-outline" type="button">
                                Cancal
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
        googLoginForm,
    },

    data() {
        return {
            is_show: false,
            showInvalid:false,
            type: 'text',
            isClickSigIn: false,
            isInval: 'Invalid email address or password!',
            isEmptyEmail: false,
            isEmptyPassword: false,

            registerValidation: false,
            emailUser: ' ',
            passwordUser: '',
            role: 'user',
            firstName: ' ',
            lastName: ' ',
            gender: ' ',
            phoneNumber: ' ',
            isNoPass: false,
            isFirstNameEmpty: false,
            email: '',
            password:''

            // login: {
            //     email: this.email,
            //     password: this.password,
            // },


            // error: []
        }
    },
    methods: {
        show_register(){
            this.is_show= true;
        },

        checkInput(input) {
            if(input.trim() == ''){
                return '';
            }
        },

        checkPassword(pass) {
            if(pass.trim() == ''){
                return this.isNoPass = true;
            }
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
                axios.post("http://127.0.0.1:8000/api/user", body)
                this.is_show = false;
            }

            // if (this.firstName.trim() == ""){
            //     this.isFirstNameEmpty = false;
            // }

            // if (this.firstName.trim() != '') {
            //     this.isFirstNameEmpty = false
            //     this.registerValidation = !this.registerValidation

            // }
            
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
                axios.post('http://localhost:8000/api/login/', 
                {email: this.email, password: this.password }).then((res) => {
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

            if (this.email == '') {
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

            // console.log(this.login)
            // this.error = []
            // for (const item in this.login){
            //     if (this.login[item] === "" || this.login[item].length === 0){
            //         this.error.push(item)
            //     }

            // }
            // if (this.error.length === 0){
            //     alert ("You have been logged in successfully")
            // }
            // console.warn(this.error);
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


<style scoped>
.input {
       transition: border 0.2s ease-in-out;
       min-width: 280px
   }

   .input:focus+.label,
   .input:active+.label,
   .input.filled+.label {
       font-size: .75rem;
       transition: all 0.2s ease-out;
       top: -0.9rem;
       background-color: #fff;
       color: #1a73e8;
       padding: 0 5px 0 5px;
       margin: 0 5px 0 5px;
   }

   .label {
       transition: all 0.2s ease-out;
       top: 0.1rem;
       left: 0;
   }
</style>