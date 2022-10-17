<template>
    <JobList :title="title" :jobList="jobList" />
</template>


<script>
import JobList from "../ListJob/JobList.vue"
export default {
    components: {
        JobList,
    },
    data() {
        return {
            title: "Quick Links",
            jobList:['Part-time job','Full-time job','Training WorkShop']
        }
    }
}
    
</script>