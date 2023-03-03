<script>
import Header from './components/Header.vue';

export default {
  name: "App",
  components: {
    Header
  },
  data() {
    return {
    }
  },
  methods: {

  }
}  
</script>


<template>
  <Header></Header>
  <router-view/>
</template>

<style lang="scss">
@use './styles/general.scss' as *;
</style>
