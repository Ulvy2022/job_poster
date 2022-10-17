<template>
  <section>
    <client-nav @click="showPostForm"></client-nav>
    <post-form v-if='isShowPostForm'></post-form>
  </section>
</template>

<script>
import PostForm from '../components/postJob/PostForm.vue'
import ClientNavbar from '../components/navBar/clientNavbar.vue'
export default {
  components: {
    'post-form': PostForm,
    'client-nav': ClientNavbar
  },
   data() {
    return {
      isShowPostForm: false,
    }
  },
  methods: {
    showPostForm(){
      this.isShowPostForm = true
    }
  }
}
</script>

<style>

</style>