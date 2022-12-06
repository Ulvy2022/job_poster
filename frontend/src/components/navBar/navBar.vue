<template>
    <Disclosure as="nav" class="bg-blue-500" v-slot="{ open }">
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


                    <div class="hidden w-full sm:ml-6 sm:block lg:mt-2">
                        <div class="flex space-x-4">
                            <router-link to="/"
                                class="text-white block mt-4 lg:inline-block active lg:mt-0 hover:text-white mr-4">
                                Job List
                            </router-link>

                            <router-link to="/subscribe"
                                class="text-white block mt-4 lg:inline-block active lg:mt-0 hover:text-white mr-4">
                                Subscribe
                            </router-link>

                            <router-link to="/userList" v-if="role == 'Admine'"
                                class="text-white block mt-4 lg:inline-block active lg:mt-0 hover:text-white mr-4">
                                UserList
                            </router-link>

                            <router-link to="/login" v-if="(role.length == 0)"
                                class="text-white block mt-4 lg:inline-block active lg:mt-0 hover:text-white">
                                Login
                            </router-link>

                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 ">
                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-5 " v-if="img != ''">
                        <div class="w-full">
                            <MenuButton class="flex rounded-full text-sm">
                                <span class="sr-only">Open user menu</span>
                                <div class="avatar mr-5">
                                    <div class="lg:w-12 w-10 rounded-full ring  ring-offset-base-100 ring-offset-2">
                                        <img class="object-cover lg:h-10  object-center"
                                            v-if="role == 'Admine' && img == null"
                                            src="../../assets/images/software-engineer.png" />

                                        <img class="object-cover h-10 object-center" v-else-if="img != null"
                                            :src="img" />

                                        <img class="object-cover"
                                            v-else-if="img == null && gender == 'Female' || gender == 'F'"
                                            src="../../assets/images/woman.png" />

                                        <img class="object-cover"
                                            v-else-if="img == null && gender == 'Male' || gender == 'M'"
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
                                    <a href="#" class="flex place-items-center gap-2"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-6 w-6 fill-blue-500 ">
                                            <path
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                        Your Profile
                                    </a>
                                </router-link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <p class="cursor-pointer" @click="clearLocalStorage">
                                    <a class="flex place-items-center gap-2"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="h-6 w-6 fill-blue-500 ">
                                            <path
                                                d="M534.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L434.7 224 224 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM192 96c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-53 0-96 43-96 96l0 256c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                        </svg>
                                        Sign Out
                                    </a>

                                </p>
                                </MenuItem>

                                <MenuItem v-slot="{ active }">
                                <router-link to="/setting">
                                    <a href="#" class="flex place-items-center gap-2"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-6 w-6 fill-blue-500 ">
                                            <path
                                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
                                        </svg>
                                        More Options
                                    </a>
                                </router-link>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3" v-if="role == 'Admine'">
                <DisclosureButton v-for="item in navigationAdmine" :key="item.name" as="a"
                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']"
                    :aria-current="item.current ? 'page' : undefined">
                    <router-link class="w-full" :to="item.href">
                        {{ item.name }}
                    </router-link>
                </DisclosureButton>
            </div>
            <div class="space-y-1 px-2 pt-2 pb-3" v-else>
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a"
                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']"
                    :aria-current="item.current ? 'page' : undefined">
                    <router-link class="w-full" :to="item.href">
                        {{ item.name }}
                    </router-link>
                </DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'

const navigation = [
    { name: 'Job List', href: '/', current: false },
    { name: 'Subscribe Plan', href: '/subscribe', current: false },
    { name: 'Login', href: '/login', current: false },
]
const navigationAdmine = [
    { name: 'Job List', href: '/', current: false },
    { name: 'Subscribe Plan', href: '/subscribe', current: false },
    { name: 'Users List', href: '/userList', current: false },
]
</script>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            role: '',
            img: '',
            fullName: '',
            userId: localStorage.getItem("userId"),

        }
    },

    methods: {
        clearLocalStorage() {
            window.location.assign('/login')
            localStorage.setItem('userId', undefined);
            localStorage.setItem('role', undefined);
        },

        userInfo() {
            if (this.userId > 0) {
                axios.get("http://localhost:8000/api/user/" + localStorage.getItem("userId")).then((res) => {
                    this.role = res.data[0].role;
                    this.img = res.data[0].img;
                    this.fullName = res.data[0].fullName;
                })
            }
            if (this.role == "Admine") {
                this.navigation.push(
                    { name: 'Users List', href: '/userList', current: false },
                )
            }
        }
    },

    mounted() {
        this.userInfo()
    }
}
</script>

<style scoped>
nav a.router-link-exact-active {
    text-decoration: underline;
}
</style>
