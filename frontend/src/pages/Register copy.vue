<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        email: '',
        password: '',
      }
    };
  },
  methods: {
    login() {
      axios.post('http://127.0.0.1:8000/api/login' , this.form)
        .then(response => {
          console.log(response.data);
          
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};

</script>

<template>
    <div>
    <form @submit.prevent="login">
      <div>
        <label for="email">Email:</label>
        <input type="email" name="email" v-model="form.email">
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" v-model="form.password">
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<style lang="scss" scoped>
@use '../styles/general.scss' as *;
</style>
