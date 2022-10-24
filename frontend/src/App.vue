<template>
  <Navbar  />
  <router-view/>
</template>

<script>
import Navbar from './components/navBar/navBar.vue';
export default {
  components: {
    Navbar,
  },
  emits: ['hide-menu'],
  data() { 
    return {
      isShowMenuBar: null,
      isShowJob: false,
    }
  },

  methods: {
    // showMenuBar() {
    //   this.isShowMenuBar = localStorage.getItem('userId');
    //   this.timeOut = setTimeout(() => {
    //     this.showMenuBar()
    //   }, 100);
    //   if (this.isShowMenuBar != null) {
    //     clearTimeout(this.timeOut);
    //   }
    // }, 

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

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
