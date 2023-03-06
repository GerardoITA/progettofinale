<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        name: '',
        last_name: '',
        date_of_birth: '',
        email: '',
        password: '',
        c_password:''
      }
    };
  },
  methods: {
    register() {
      axios.post('http://127.0.0.1:8000/api/register' , this.form)
        .then(response => {
          console.log(response.data);
          // Esegui qui le azioni desiderate dopo la registrazione
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
    <form @submit.prevent="register">
      <div>
        <label for="name">Name:</label>
        <input type="text" name="name" v-model="form.name">
      </div>
      <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" v-model="form.last_name">
      </div>
      <div>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" v-model="form.date_of_birth">
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" name="email" v-model="form.email">
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" v-model="form.password">
      </div>
      <div>
        <label for="c_password">Password Confirmed:</label>
        <input type="password" name="c_password" v-model="form.c_password">
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</template>

<style lang="scss" scoped>
@use '../styles/general.scss' as *;
.contenitore {
  display: flex;
  gap: 25px;
  width: 1200px;
  flex-wrap: wrap;
  .routerLink {
    color: red;
    text-decoration: none;
  }
}
</style>
