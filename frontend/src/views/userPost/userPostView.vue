<template>
    <!-- <userDetails /> -->
    <userPost />
    <userSub />
</template>

<script>
import userPost from '../../components/userPost/userPost.vue'
// import userDetails from "../../components/userDetails/userDetails.vue"
import userSub from "../../components/userSub/userSubForm.vue"
export default {
    components: {
        userPost,
        // userDetails,
        userSub
    }
}
</script>