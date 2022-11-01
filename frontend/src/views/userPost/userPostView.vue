<template>
    <userDetails />
    <userPost />
</template>

<script>
import userPost from '../../components/userPost/userPost.vue'
import userDetails from "../../components/userDetails/userDetails.vue"

export default {
    components: {
        userPost,
        userDetails
    }
}
</script>