<template>
  <Navbar />
  <router-view />
</template>

<script>
import Navbar from './components/navBar/navBar.vue';
export default {
  components: {
    Navbar,
  },
  data() {
    return {
      isShowMenuBar: null,
      isShowJob: false,
      imgae: ''
    }
  },

  methods: {

    showForm() {
      this.isShowJob = true
    }
  },
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Merienda&display=swap');

#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  font-family: "Roboto", sans-serif;
}
</style>