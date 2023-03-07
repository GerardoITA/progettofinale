  <script>
  import { useRouter } from 'vue-router';
  let log = {};
  export default {
    data() {
      return {
        logD:""
      }
    },
    setup() {
      const router = useRouter();
      const Logout = () => {
        localStorage.clear();
        log = {};
        router.push({ path: '/login' });
      };
      return { Logout };
    },
    mounted(){
      log = localStorage
      log = log.token
      this.logD = log
      console.log(log);

    }
  };
  </script>

<template>
    <nav class="container flex justify-around py-8 mx-auto bg-white border">
      <div>
        <h3 class="text-2xl font-medium text-blue-500">LOGO</h3>
      </div>
      <div class="flex items-center space-x-8">
        <!-- <RouterLink to="/">Home</RouterLink> -->
        <!-- <RouterLink to="/about">About</RouterLink> -->
        <RouterLink to="/login">Login</RouterLink>
        <RouterLink to="/register">Register</RouterLink>
        <div v-if="logD">
          <RouterLink to="/dashboard">Dashboard</RouterLink>

        </div>

        <button @click="Logout">Logout</button>
      </div>
    </nav>
  </template>