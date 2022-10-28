<template>
    <div class="navbar p-3 bg-blue-500 ">
        <div class="navbar-start">
            <div class="dropdown">
                <div class="tooltip  tooltip-right" data-tip="Menu Option">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                    </label>
                </div>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <router-link to="/">
                        <li><a>Job List</a></li>
                    </router-link>
                    <router-link to="/job_category">
                        <li><a>Job category</a></li>
                    </router-link>
                    <router-link to="/companyList">
                        <li><a>Company List</a></li>
                    </router-link>
                    <li><a>Job Location</a></li>
                    <router-link to="/subscribe">
                        <li><a>Subscribe Plan</a></li>
                    </router-link>
                    <li @click="logOut()">
                        <a>Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-center" >
            <a class="btn btn-ghost normal-case text-xl text-white ">Job Seeker</a>
        </div>
        <div class="navbar-end flex" v-if="userName != '' " >
            <router-link to="/profile">
                <div class="avatar flex justify-start items-center tooltip tooltip-bottom" data-tip="See your profile">
                    <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2  lg:mr-5 ml-4  " >
                        <img class="object-cover h-10 object-center"  v-if="img != ''  " :src="img" />
                        <img class="object-cover"  v-else-if="img == null && gender=='Female' || gender=='F' " src="../../assets/images/woman.png" />
                        <img class="object-cover"  v-else-if="img == null && gender=='Male' || gender=='M' " src="../../assets/images/profile.png" />
                    </div>
                    <p class="text-white lg:mr-5 ml-4">{{ userName }}</p>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
// import emailjs from '@emailjs/browser';
import axios from "axios"
export default {
    data() {
            return {
                img: '',
                userName: '',
                gender: '',
                email: '',
            }
    },
    
    methods: {
        capitalize(words) {
            return words[0].toUpperCase() + words.substring(1, words.length ).toLowerCase();
        },

        logOut() {
            localStorage.clear();
            this.userName = ''
            this.$router.push('/login')
        },
        sendEmail() {
            var data = {
                service_id: 'service_d6ynfgk',
                template_id: 'template_mquhxye',
                user_id: 'l29WrxnI6hupdBdq3',
                template_params: {
                    'to_name': this.userName,
                    'user_email': this.email,
                    'g-recaptcha-response': '03AHJ_ASjnLA214KSNKFJAK12sfKASfehbmfd...'
                }
            };
            axios.post('https://api.emailjs.com/api/v1.0/email/send/', (data));
        },
        getUserInfo() {
            if (localStorage.getItem("userId") != null) {
                axios.get('http://localhost:8000/api/getUser/' + localStorage.getItem("userId")).then((res) => {
                    this.img = res.data.img
                    this.email = res.data.email
                    this.userName = this.capitalize(res.data.fullName)
                    this.gender = res.data.gender

                })

            }
        }
    },


    mounted() {
        this.getUserInfo()
    }
}
</script>

<style scoped>
@media only screen and (max-width: 768px){
    #list{
        display: none;
    }
    #avatar{
        margin-right: 10px;
    }
}
</style>