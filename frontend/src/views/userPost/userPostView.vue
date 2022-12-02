<template>
    <userPost />
    <userSub />
</template>

<script>
import userPost from '../../components/userPost/userPost.vue'
import userSub from "../../components/userSub/userSubForm.vue"
export default {
    components: {
        userPost,
        userSub
    }
}
</script>