<template>
  <navBar v-if="isShowMenuBar != null " />

  <router-view/>
</template>

<script>
import navBar from './components/navBar/navBar.vue';
export default {
  components: {
    navBar,
  },
  data() {
    return {
      isShowMenuBar: null,
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
