<template>
    <div class=" w-full ">
        <div class="lg:flex lg:w-11/12 ">
            <JobCategory />
        </div>
    </div>
</template>
<script>
import JobCategory from '../../components/Category/JobCategory.vue'
export default {
    components: {
        JobCategory,
    },
}
</script>