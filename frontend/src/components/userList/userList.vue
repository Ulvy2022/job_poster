<template>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg lg:w-11/12 lg:m-auto top-5">
        <!-- action and search bar -->
        <div class="lg:flex lg:justify-between lg:items-center pb-4 grid gap-y-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative w-11/12 m-auto lg:w-1/3">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input 
                    class="m-auto w-full block p-3 pl-10  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  capitalize"
                    v-model="search"
                    @keyup="filterUser"
                    placeholder="Search users by name">
            </div>
            <div class="lg:w-1/3 bg-gray-100 m-auto w-11/12">
                <div class="">
                    <div class="relative">
                        <div class=" bg-white flex border border-gray-400 rounded-md items-center">
                                <p class="w-full p-3 text-gray-400" >{{selected}}</p>
                            <button
                                @click="selected = 'Option' "
                                class="cursor-pointer outline-none focus:outline-none transition-all text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <label for="show_more"
                                class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-gray-600">
                                <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="18 15 12 9 6 15"></polyline>
                                </svg>
                            </label>
                        </div>
            
                        <input type="checkbox" name="show_more" id="show_more" class="hidden peer"  />
                        <div
                            class="absolute rounded shadow bg-white overflow-hidden hidden peer-checked:flex flex-col w-full mt-1 border border-gray-200">
                            <div class="cursor-pointer group" @click="valueSelected('Python')">
                                <a
                                    class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100" >Python</a>
                            </div>
                            <div class="cursor-pointer group border-t" @click="valueSelected('Javascript')">
                                <a
                                    class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 border-blue-600 group-hover:bg-gray-100" >Javascript</a>
                            </div>
                            <div class="cursor-pointer group border-t" @click="valueSelected('Node')">
                                <a
                                    class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">Node</a>
                            </div>
                            <div class="cursor-pointer group border-t" @click="valueSelected('PHP')">
                                <a
                                    class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">PHP</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4   border-gray-400  mr-3 flex place-items-end justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 fill-blue-500" viewBox="0 0 640 512">
                    <path
                        d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                </svg>
                <p class="ml-5 text-lg text-blue-500">{{ numberOfUsers }} Users</p>
            </div>
        </div>
        <!-- end of action and earch bar -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" :checked="checkbox" @click="checkbox = !checkbox" >
                            <label for="checkbox-all-search" class="sr-only"  >checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subscriber
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="user of allUsers" :key="user"  :id="user.id" >
                    <td class="p-4 w-4">
                        <div class="flex items-center" >
                            <input id="checkbox-value" :value="user.id" v-model="vlaueCheckbox" type="checkbox"
                                class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" :checked="checkbox" >
                            <label for="checkbox-value" class="sr-only" >checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img v-if="user.img != null " class="w-14 h-14 rounded-full object-cover" :src="user.img">
                        <img v-else class="w-14 h-14 rounded-full" src="../../assets/images/user.png">
                        <div class="pl-3">
                            <div class="text-base font-semibold capitalize"  :id="user.id+'name'" >{{user.fullName}} </div>
                            <div class="font-normal text-gray-500">{{user.email}}</div>
                        </div>
                    </th>
                    <td class="py-4 px-6 capitalize">
                        {{user.subscription}}
                    </td>
                    <td class="py-4 px-6  " >
                            <label for="my-modal-5" class=" bg-white text-blue-500 hover:underline  hover:underline-offset-auto cursor-pointer">Edit User</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

        
        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my-modal-5" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <label for="my-modal-5" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-lg">Congratulations random Internet user!</h3>
                <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
                <div class="modal-action">
                    <label for="my-modal-5" class="btn">Edit!</label>
                </div>
            </div>
        </div>

</template>


<script>
import axios from "axios"
export default {
    data() {
        return {
            checkbox: false,
            allUsers: null,
            selected: 'Option',
            vlaueCheckbox: [],
            search: '',
            numberOfUsers:0
        }
    },

    methods: {
        getAllUser() {
            axios.get("http://localhost:8000/api/user").then((res) => {
                this.allUsers = res.data
                this.numberOfUsers = this.allUsers.length
            })
        },
        valueSelected(value) {
            this.selected = value;
        },

        deleteUser() {
            console.log(this.vlaueCheckbox);
        },

        filterUser() {
            for (let user of this.allUsers) {
                var element = document.getElementById(user.id);
                var elementText = document.getElementById(user.id + 'name').textContent;
                if (elementText.search(this.search) > -1) {
                    element.style.display = '';
                } else {
                    element.style.display = 'none'
                }
                console.log(elementText.search(this.search));
            }
        }
    },

    mounted() {
        this.getAllUser()
    }
}
</script>