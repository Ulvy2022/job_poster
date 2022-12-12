<template>
    <div class="w-full m-auto grid p-3 ">
        <div class="flex  justify-between cursor-pointer bg-slate-100 p-3">
            <div class="avatar placeholder ml-2 flex justify-start items-center">
                <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                    <span class="text-3xl">{{ firstLetter(companyName) }}</span>
                </div>
                <p class="text-2xl text-blue-500 ml-4">{{ jobDetails.company_name }}</p>
            </div>

        </div>
        <!-- job details -->
        <div class="lg:flex md:grid md:w-full ">
            <div class="grid w-full">
                <div class="grid md:w-full shadow-lg shadow-gray-200 ">
                    <div class="w-full">
                        <p class="p-3 bg-blue-400 text-white text-xl w-full">Contact details</p>
                        <p class="p-3 text-sm w-full"><b>{{ jobDetails.company_name }} Address</b> - #9AB,
                            {{ jobDetails.company_address }}
                        </p>
                    </div>
                    <!-- contact person name -->
                    <div class="grid p-3">
                        <b class="">Contact Name</b>
                        <div class="flex items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6 w-6  ">
                                <path
                                    d="M208 256c35.35 0 64-28.65 64-64c0-35.35-28.65-64-64-64s-64 28.65-64 64C144 227.3 172.7 256 208 256zM464 232h-96c-13.25 0-24 10.75-24 24s10.75 24 24 24h96c13.25 0 24-10.75 24-24S477.3 232 464 232zM240 288h-64C131.8 288 96 323.8 96 368C96 376.8 103.2 384 112 384h192c8.836 0 16-7.164 16-16C320 323.8 284.2 288 240 288zM464 152h-96c-13.25 0-24 10.75-24 24s10.75 24 24 24h96c13.25 0 24-10.75 24-24S477.3 152 464 152zM512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM528 416c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16V96c0-8.822 7.178-16 16-16h448c8.822 0 16 7.178 16 16V416z" />
                            </svg>
                            <p class="ml-3 text-sm">{{ fname }} </p>
                        </div>
                    </div>
                    <div class="grid p-3">
                        <b class="">Email</b>
                        <div class="flex items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                            </svg>
                            <p class="ml-3 text-sm">{{ email }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="grid">

            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            jobDetails: [],
            fname: '',
            phone: '',
            email: '',
            companyName: ''
        }
    },

    methods: {
        getJobDetail() {
            axios.get('http://localhost:8000/api/jobposterId/' + this.$route.params.id).then((res) => {
                this.jobDetails = res.data
                this.fname = this.jobDetails.contact_name;
                this.phone = '';
                this.email = this.jobDetails.contact_email;
                this.companyName = this.jobDetails.company_name;
            })
        },

        firstLetter(words) {
            return words[0];
        }
    },
    mounted() {
        this.getJobDetail()
    }
}
</script>