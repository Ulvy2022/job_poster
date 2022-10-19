<template>
  <Navbar v-if="isShowMenuBar != null"/>
  <router-view/>
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
    }
  },

  methods: {
    showMenuBar() {
      this.isShowMenuBar = localStorage.getItem('userId');
      this.timeOut = setTimeout(() => {
        this.showMenuBar()
      }, 1000);
      if (this.isShowMenuBar != null) {
        clearTimeout(this.timeOut);
      }
    }, 

    showForm() {
        this.isShowJob = true
      }
  },

  mounted() {
    this.showMenuBar()
  }
  
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;

}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
