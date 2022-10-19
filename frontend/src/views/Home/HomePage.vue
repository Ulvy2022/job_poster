<template>
    <section>
        <JobType />
        <QuickLink />
        <JobCategory />
        <PostForm/>
       
    </section>
</template>

<script>
import JobCategory from '../../components/Category/JobCategory.vue'
import JobType from '../../components/JobType/JobType.vue'
import QuickLink from '../../components/QuickLink/QuickLink.vue'
import PostForm from '../../components/postJob/PostForm.vue'

export default {
    components: {
        JobCategory,
        JobType,
        QuickLink,
        PostForm
    },
}
</script>