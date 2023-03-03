<script>
import axios from 'axios';
import { store } from '../store';
import Apartment from './Apartment.vue'

export default {
    name: "ApartmentList",
    components: {
      Apartment
    },
    data() {
      return {
        store
      }
    },
    mounted() {
       axios.get(store.AllApartmentsAPI)
         .then(res => {
             store.ApartmentList = res.data.response.apartments;
 
         });
  }
}
</script>

<template>
ApartmentList

  <div class="contenitore">
    <router-link class="routerLink" :to="'/create'" v-for="apartment in store.ApartmentList" :key="apartment.id">
        <Apartment :nome="apartment.title" :id="apartment.id" :immagine="apartment.main_image">
        </Apartment>
    </router-link>
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
