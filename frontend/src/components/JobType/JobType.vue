<template>
    <JobList :title="title" :jobList="jobs" />
</template>


<script>
import JobList from "../ListJob/JobList.vue"
export default {
    components: {
        JobList,
    },
    data() {
        return {
            title: "Job Category",
            jobs:['Accounting','Banking','English Teacher'],
        }
    }
}

</script>