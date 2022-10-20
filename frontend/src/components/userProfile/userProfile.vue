<template>
  
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400 ml-3">
                        <div class="image overflow-hidden ">
                                <img class="h-auto w-full mx-auto" v-if="img != null  " :src="img" />
                                <img class="h-auto w-full mx-auto" v-else-if="img == null && gender=='F' " src="../../assets/images/woman.png" />
                                <img class="h-auto w-full mx-auto" v-else-if="img == null && gender=='M' " src="../../assets/images/profile.png" />
                        </div>
                      
                    </div>
                    <!-- End of profile card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-72">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm w-full">
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
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2">{{fname}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">{{lname}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2" v-if="gender != null">{{gender}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Phone Number</div>
                                    <a class="px-4 py-2 hover:underline hover:underline-offset-2 hover:text-blue-500" :href="'tel:+855'+phoneNumber" v-if="phoneNumber != null">{{phoneNumber}}</a>
                                    <div class="px-4 py-2" v-else>....</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Current Address</div>
                                    <div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Company Name</div>
                                    <div class="px-4 py-2" v-if="companyName != null">Arlington Heights, IL, Illinois</div>
                                    <div class="px-4 py-2" v-else>....</div>
                                    
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800 hover:underline hover:underline-offset-3" :href="'mailto:'+email">{{email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <div class="px-4 py-2">....</div>
                                </div>
                            </div>
                        </div>
       
                        <div class="p-10"></div>
                    </div>
                    <!-- End of about section -->
    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data() {
        return {
            img: '',
            fname: '',
            lname: '',
            gender: '',
            phoneNumber: '',
            companyName: '',
            bd: '',
            email: '',
            address: '',

        }
    },


    methods: {
        getUserData() {
            axios.get('http://localhost:8000/api/getUser/' + localStorage.getItem("userId")).then((res) => {
                this.img = res.data.img;
                this.fname = this.capitalize(res.data.firstName) 
                this.lname = this.capitalize(res.data.lastName)
                this.gender = res.data.gender;
                this.email = res.data.email;
                this.phoneNumber = res.data.phoneNumber;
            })
        },
        capitalize(words) {
            return words[0].toUpperCase() + words.substring(1, words.length).toLowerCase();
        }
    },

    mounted() {
        this.getUserData()
    }
}
</script>