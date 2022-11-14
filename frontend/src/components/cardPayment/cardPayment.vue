<template>
    <div class="m-auto lg:w-5/12 mb-5 grid grid-cols-1 justify-center place-items-center mt-10 w-full shadow-md">
        <!-- email -->
        <div class="mb-6 lg:w-11/12 w-11/12">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                email</label>
            <input type="email" v-model="address"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name@gmail.com">
        </div>
        <!-- name -->
        <div class="mb-6 lg:w-11/12 w-11/12">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name on
                card</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your name">
        </div>
        <div class="mb-6 lg:w-11/12 w-11/12 grid grid-cols-1">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Card
                information</label>
            <div class=" grid grid-cols-1">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="1234 1234 1234 1234  ">
                <div class="grid grid-cols-2">
                    <input type="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="MM/YY">
                    <input type="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="CVC">
                </div>
            </div>
        </div>
        <div class="mb-6 lg:w-11/12 w-11/12">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                country</label>
            <div class="grid">
                <div class="flex w-full">
                    <span
                        class="inline-flex items-center   text-sm text-gray-900  rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">

                        <img :src="countryFlag" class="w-16 h-10" alt="">
                    </span>
                    <input type="text" id="website-admin"
                        class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        @keyup="getUserFlage" v-model="countryName" laceholder="Country name">
                </div>
                <input type="text"
                    class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    laceholder="Country name">
            </div>
        </div>
        <button type="button"
            class="text-black  border border-black hover:bg-black hover:text-white focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Buy
            Now</button>
    </div>
</template>


<script>
import axios from "axios";
// import CountryFlag from 'vue-country-flag-next'

export default {
    // components: {
    //     CountryFlag,
    // },
    data() {

        return {
            address: "",
            countryFlag: '',
            countryName: ''
        };
    },

    methods: {
        getUserAddress() {
            axios.get('https://ipgeolocation.abstractapi.com/v1/?api_key=98996f321b0345a19cf103bd0ef6e089')
                .then(response => {
                    const nameFlage = response.data.flag.png
                    this.countryFlag = nameFlage;
                    this.countryName = response.data.country
                })
        },

        getUserFlage() {
            if (this.countryName != '') {
                axios.get("https://restcountries.com/v3.1/name/" + this.countryName.toLowerCase()).then((response) => {
                    const cName = response.data[0].flags.png
                    if (cName.length > 0) {
                        this.countryFlag = cName.toLowerCase();
                    }
                })
            }

        },


    },

    mounted() {
        this.getUserAddress()
    }
}
</script>