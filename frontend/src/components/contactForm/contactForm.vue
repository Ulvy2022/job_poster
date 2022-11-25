<template>
    <div class="w-full lg:w-11/12 bg-white mt-5 lg:mt-0 h-full lg:p-10 animate__animated animate__fadeIn">
        <p class="p-3 bg-blue-500 text-white">Contact Info</p>
        <div class="lg:w-full w-11/12 m-auto">
            <!-- phone number -->
            <div class="w-full mt-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs mb-2" for="grid-password">
                    Phone Number
                </label>
                <input v-model="phoneNumber"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text">
            </div>
            <!-- email -->
            <div class="w-full mt-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs mb-2" for="grid-password">
                    Email
                </label>
                <input v-model="email"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text">
            </div>

            <!-- full name -->
            <div class="w-full mt-5">
                <label class="block uppercase tracking-wide text-gray-700 text-xs mb-2" for="grid-password">
                    Full Name
                </label>
                <input v-model="fullName"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text">
            </div>
        </div>
        <!-- button save -->
        <div class="lg:w-full w-11/12 m-auto flex justify-end  mt-9">
            <button class="p-3 bg-blue-500 text-white rounded-md w-40 " @click="updateUserInfo">Update</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userInfo'],
    data() {
        return {
            phoneNumber: '',
            email: '',
            fullName: '',
        }
    },

    methods: {
        getUserInfo() {
            this.phoneNumber = this.userInfo.phoneNumber;
            this.email = this.userInfo.email;
            this.fullName = this.userInfo.fullName;
            if (this.phoneNumber == null) {
                this.phoneNumber = "You don't fill phone number yet!";
            }
        },

        updateUserInfo() {
            const info = { phoneNumber: this.phoneNumber, fullName: this.fullName, email: this.email };
            this.$emit("updateUserInfo", info);

        }
    },

    mounted() {
        this.getUserInfo();
    }
}
</script>