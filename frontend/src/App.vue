<template>
  <navBar v-if="isShowMenuBar != null" />
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
