<template>
    <JobList :title="title" :jobList="jobList"/>
</template>

<script>
import JobList from "../ListJob/JobList.vue"
export default {
    components: {
        JobList,
    },
    data() {
        return {
            title:"Quick Links",
            jobList:['Part-Time', 'Full-Time', 'Training WorkShop']
        }
    }
}

</script>