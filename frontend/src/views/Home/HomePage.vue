<template>
    <div class=" w-full ">
        <div class="lg:flex lg:w-11/12 lg:ml-48">
            <div class="lg:w-3/6 ">
                <JobType />
                <QuickLink />
            </div>
            <div class="lg:w-11/12">
                <JobCategory />
            </div>
        </div>
    </div>
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