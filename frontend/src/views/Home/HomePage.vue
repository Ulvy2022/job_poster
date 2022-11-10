<template>
    <div class=" w-full ">
        <div class="lg:flex lg:w-11/12 lg:ml-48">
            <PostForm />
            <JobCategory />
        </div>
    </div>
</template>

<script>
import JobCategory from '../../components/Category/JobCategory.vue'
import PostForm from '../../components/postJob/PostForm.vue'

export default {
    components: {
        JobCategory,
        PostForm
    },


}
</script>