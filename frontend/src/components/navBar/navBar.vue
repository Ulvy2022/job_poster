

<template>
    <Disclosure as="nav" class="bg-blue-500 " v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start ">
                    <div class="flex flex-shrink-0 items-center bg-white rounded-full h-10 w-10 lg:block hidden">
                        <img class="block lg:h-8 w-auto lg:hidden"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                        <img class="hidden h-8 w-auto lg:block"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                    </div>
                    <div class="hidden sm:ml-6 sm:block lg:mt-2">
                        <div class="flex space-x-4">
                            <router-link to="/">
                                <a  class=" text-white hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">
                                    Job List
                                </a>
                            </router-link>
                            <router-link to="/companyList">
                                <a class=" text-white hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">
                                    Company List
                                </a>
                            </router-link>
                            <router-link to="/subscribe">
                                <a class=" text-white hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">
                                    Subscribe
                                </a>
                            </router-link>
                            <router-link to="/userList">
                                <a class=" text-white hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">
                                    UserList
                                </a>
                            </router-link>
                            <router-link to="/job_category">
                                <a class=" text-white hover:bg-white hover:text-black px-3 py-2 rounded-md text-sm font-medium">
                                    Job category
                                </a>
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 ">
                    
                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-5 ">
                        <div class="w-full ">
                            <MenuButton
                                class="flex rounded-full  text-sm">
                                <span class="sr-only">Open user menu</span>
                                <div class="avatar mr-5">
                                    <div class="lg:w-12 w-10 rounded-full ring  ring-offset-base-100 ring-offset-2">
                                        <img class="object-cover lg:h-10  object-center" v-if="role == 'Admine' && img== null " src="../../assets/images/software-engineer.png" />
                                        <img class="object-cover h-10 object-center" v-else-if="img != null  " :src="img" />
                                        <img class="object-cover" v-else-if="img == null && gender=='Female' || gender=='F' "
                                            src="../../assets/images/woman.png" />
                                        <img class="object-cover" v-else-if="img == null && gender == 'Male' || gender == 'M'"
                                            src="../../assets/images/profile.png" />
                                        <img class="object-cover" v-else src="../../assets/images/user.png" />
                                    </div>
                                </div>
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                            <MenuItems
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <MenuItem v-slot="{ active }">
                                    <router-link to="/profile">
                                        <a href="#"
                                            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile
                                        </a>
                                    </router-link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <router-link to="/login">
                                        <a href="#"
                                            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign Out
                                        </a>
                                    </router-link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Setting
                                </a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a" 
                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']"
                    :aria-current="item.current ? 'page' : undefined">
                    <router-link :to="item.href">
                        {{ item.name }}
                    </router-link>
                
                </DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon,  XMarkIcon } from '@heroicons/vue/24/outline'

const navigation = [
    { name: 'Job List', href: '/', current: false },
    { name: 'Company List', href: '/companyList', current: false },
    { name: 'Subscribe Plan', href: '/subscribe', current: false },
    { name: 'Users List', href: '/userList', current: false },
    { name: 'Job category', href: '/job_category', current: false },
]
</script>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            role: 'User',
            img: '',
            fullName:''
        }
    },

    mounted() {
        axios.get("http://localhost:8000/api/user/" + localStorage.getItem("userId")).then((res) => {
            console.log(res.data[0]);
            this.role = res.data[0].role;
            this.img = res.data[0].img;
            this.fullName = res.data[0].fullName;
        })
    }
}
</script>
