<template>
    <div class="flex w-11/12 m-auto ">
        <div class="w-3/5">
            <jobType />
            <quickLink />
        </div>
    </div>
</template>

<script>
import quickLink from '../../components/QuickLink/QuickLink.vue'
import jobType from '../../components/JobType/JobType.vue'
export default {
    components: {
        jobType,
        quickLink
    }
}
</script>