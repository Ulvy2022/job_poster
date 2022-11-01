<template>
    <div class=" w-full ">
        <div class="lg:flex lg:w-11/12 lg:ml-48">
            <div class="lg:w-3/6 ">
                <PostForm class="float-right mb-4"/>
                <JobType />
                <QuickLink />
            </div>
            <JobCategory />
        </div>
    </div>
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