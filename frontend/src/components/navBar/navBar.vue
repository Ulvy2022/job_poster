<template>
    <div class="navbar p-3 bg-blue-500 ">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <router-link to="/home">
                        <li><a>Job List</a></li>
                    </router-link>
                    <router-link to="/job_category">
                        <li><a>Job category</a></li>
                    </router-link>
                    <li><a>Company List</a></li>
                    <li><a>Job Location</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-xl text-white ">Job Seeker</a>
        </div>
        <div class="navbar-end flex">
            <router-link to="/profile">
                <div class="avatar flex justify-start items-center ">
                    <div class="w-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2  mr-5">
                        <img v-if="img != null  " :src="img" />
                        <img v-else-if="img == null && gender=='Female' " src="../../assets/images/woman.png" />
                        <img v-else-if="img == null && gender=='Male' " src="../../assets/images/profile.png" />
                    </div>
                    <p class="text-white mr-5">{{userName}}</p>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
            return {
                img: '',
                userName: '',
                gender:''
            }
    },

    methods: {
        capitalize(words) {
            return words[0].toUpperCase() + words.substring(1, words.length ).toLowerCase();
        }
    },

    mounted() {
        axios.get('http://localhost:8000/api/getUser/' + localStorage.getItem("userId")).then((res) => {
            console.log(res.data);
            this.img = res.data.img
            this.userName = this.capitalize(res.data.firstName) + ' ' + this.capitalize(res.data.lastName)
            this.gender = res.data.gender
        })
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