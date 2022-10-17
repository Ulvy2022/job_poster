<template>
    <JobType />
    <QuickLink />
    <JobCategory />
</template>

<script>
import JobCategory from '../../components/Category/JobCategory.vue'
import JobType from "../../components/JobType/JobType.vue"
import QuickLink from '../../components/QuickLink/QuickLink.vue'
export default {
    components: {
        JobCategory,
        JobType,
        QuickLink
    },

    // data() {
    //     return {
    //         jobInfo: { jobTitle: 'IT Support', companyName: "Coolbean", days :3,data:'22-Nov-2022'}
    //     }
    // }
}
</script>