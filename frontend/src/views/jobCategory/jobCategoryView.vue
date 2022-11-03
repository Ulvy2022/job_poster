<template>
    <div class=" w-full ">
        <div class="lg:flex lg:w-11/12 lg:ml-20 grid">
            <div class="lg:w-3/6 ">
                <QuickLink />
                <PostForm/>
            </div>
            <JobCategory />
        </div>
    </div>
</template>

<script>
import JobCategory from '../../components/jobCategory/jobCategoryForm.vue'
import QuickLink from '../../components/QuickLink/QuickLink.vue'
import PostForm from '../../components/postJob/PostForm.vue'

export default {
    components: {
        JobCategory,
        QuickLink,
        PostForm
    },
}
</script>