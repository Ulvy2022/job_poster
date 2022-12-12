<template>

    <div class="w-full lg:w-11/12 bg-white h-full lg:p-10 animate__animated animate__fadeIn ">
        <form class="mb-5 w-11/12 m-auto mt-5 lg:w-full">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    @keyup="filterJobsByName('ll')" v-model="searchValue" placeholder="Search CV by job name" required>
            </div>
        </form>
        <p class="p-3 bg-blue-500 text-white">Candidate's Applied CV</p>
        <div class="p-3 bg-blue-500 text-white flex justify-between border-t-2 border-white">
            <p>Job Name </p>
            <p>Candidate's CV</p>
            <p>Applied at</p>
        </div>
        <div class="w-full border " v-for="cv of userCV" :key="cv">
            <!-- subscription -->
            <div class="w-full bg-white flex-1 justify-between p-3 shadow-sm animate__animated animate__fadeIn"
                v-for="resume of cv.cv" :key="resume" :id="resume.id"
                :class="{ 'hidden': !filterJobsByName(cv.job_title) }">
                <!-- check sign -->
                <div class="flex justify-between gap-3 items-center w-full mb-3">
                    <p class="capitalize" :id="resume.id + 'title'">{{ cv.job_title }}</p>
                    <p> {{ timestampToDate(cv.created_at) }}</p>
                </div>
                <iframe :src="resume.CV" class="w-full overflow-auto" style="height:100vh;"></iframe>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['userCV'],
    data() {
        return {
            searchValue: ''
        }
    },

    methods: {
        timestampToDate(date) {
            var now = new Date(date);
            return now.toDateString();
        },
        filterJobsByName(valueToHS) {
            if (this.searchValue.trim() != '' && valueToHS.toLowerCase().search(this.searchValue.toLowerCase()) > -1) {
                return true;
            } else if (this.searchValue.trim() != '' && valueToHS.toLowerCase().search(this.searchValue.toLowerCase()) == -1) {
                return false;
            } else {
                return true;
            }
        }
    },

}
</script>