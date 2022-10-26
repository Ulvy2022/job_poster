<template>
  
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400 ml-3 " style="height:51vh;">
                        <div class="image overflow-hidden ">
                                <img class="h-60 w-auto mx-auto" v-if="img != null  " :src="img" />
                                <img class="h-60 w-auto mx-auto" v-else-if="img == null && gender=='F' " src="../../assets/images/woman.png" />
                                <img class="h-60 w-auto mx-auto" v-else-if="img == null && gender=='M' " src="../../assets/images/profile.png" />
                        </div>
                      <input type="file" @change="onFileChange">
                    </div>
                    <!-- End of profile card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-72">
                    <!-- Profile tab -->
                    <!-- About Section -->
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
                                    <div class="px-4 py-2 font-semibold">Company Name</div>
                                    <div class="px-4 py-2" v-if="companyName != null">{{companyName}}</div>
                                    <div class="px-4 py-2" v-else>....</div>
                                
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800 hover:underline hover:underline-offset-3" :href="'mailto:'+email">{{email}}</a>
                                    </div>
                                </div>
                           
                             
                            </div>
                        </div>
       
                        <div class=" w-full flex justify-start items-start " >
                            <!-- The button to open modal -->
                            <label for="my-modal-3" class="btn modal-button lg:mt-16 lg:mb-2" >Edit Profile</label>
                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                            <div class="modal w-full" id="formEdit">
                                <div class="modal-box lg:w-3/5 max-w-5xl w-11/12">
                                    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2" @click="getUserData(), showBtnProgress = false,
                                    showBtnSave = false,showBtnSaved=false">✕</label>
                                    <h3 class="text-lg font-bold mb-4">Edit your profile </h3>
                                    <!-- form edit profile user -->
                                    <form @submit.prevent="hideFormEditPf" class="w-full ">
                                        <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="fname"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                                    name</label>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="lname"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
                                            </div>
                                        </div>
                                        <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="gender"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Gender</label>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="phoneNumber"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Phone Number</label>
                                            </div>
                                        </div>
                                        <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="email" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model='email' placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Email</label>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="companyName"
                                                    placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Company Name</label>
                                            </div>
                                        </div>   
                                        <!-- <div class=" grid grid-cols-2 gap-4 mt-2">
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="newPassword" placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    New Password</label>
                                            </div>
                                            <div class="relative z-0 mb-6 w-full group">
                                                <input type="text" name="floating_email" id="floating_email"
                                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                    v-model="phoneNumber" placeholder=" " required />
                                                <label for="floating_email"
                                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                    Old Password</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="  text-white flex px-12 py-3 bg-gray-600 rounded-md" v-if="!showBtnSave" @click="updateProfile()"> Save</button>      
                                        <button type="submit" class="btn bg-gray-600 text-white loading px-7 py-3 rounded-md" v-if="showBtnProgress">Saving</button>
                                        <button type="button"
                                            v-if="showBtnSaved"
                                            class="text-white bg-gray-600 px-5 py-3  rounded-md grid grid-cols-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-4  fill-white" viewBox="0 0 512 512">
                                                <path
                                                    d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>
                                            Saved
                                        </button>

                                    </form>
                                    <!-- end form edit profile user -->
                                </div>
                    
                            </div>
                        </div>
                    </div>
                
                    <!-- End of about section -->
    
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
            showBtnSaved:false,
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
                this.address = res.data.address;
                this.phoneNumber = res.data.phoneNumber;
                this.companyName = res.data.companyName;
            })
            
        },
        capitalize(words) {
            return words[0].toUpperCase() + words.substring(1, words.length).toLowerCase();
        },

        onFileChange(e) {
            const file = e.target.files[0];
            this.img = URL.createObjectURL(file);
        },

        updateProfile() {
            this.showBtnSave = !this.showBtnSave;
            this.showBtnProgress = !this.showBtnProgress
            var userInfo = {
                firstName: this.fname,
                lastName: this.lname,
                gender: this.gender,
                email: this.email,
                phoneNumber: this.phoneNumber,
                companyName:this.companyName
            }
            axios.put("http://localhost:8000/api/user/" + localStorage.getItem('userId')+'/', userInfo).then((res) => {
                if (res.data.msg == 'updated') {
                    this.showBtnSaved = !this.showBtnSaved
                    this.showBtnProgress = !this.showBtnProgress
                    this.showBtnSave = true
                }
                console.log(res.data);
            }).catch(() => {
                this.getUserData()
            })
        },


 
    },

    mounted() {
        this.getUserData()
    }
}
</script>