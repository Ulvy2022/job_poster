<template>
    <div class="flex w-11/12 m-auto ">
        <div class="w-3/5">
            <jobType />
            <quickLink />
        </div>
        <jobLocation/>
    </div>
</template>

<script>
import quickLink from '../../components/QuickLink/QuickLink.vue'
import jobType from '../../components/JobType/JobType.vue'
import jobLocation from '../../components/jobLocation/jobLocation.vue'
export default {
    components: {
        jobLocation,
        quickLink,
        jobType
    }
}
</script>