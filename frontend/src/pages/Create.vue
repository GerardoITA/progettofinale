<script>

export default {
  name: "App",
  components: {
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
This is for creating things
  <router-link :to="'/'">
    Home
  </router-link>
  <form method="POST">
    <label for='title'>Nome dell'appartamento</label>
    <label for='rooms'>Stanze</label>
    <label for='beds'>Letti</label>
    <label for='bathrooms'>Bagni</label>
    <label for='square_meters'>Metratura</label>
    <label for='address'>Indirizzo dell'appartamento</label>
    <label for='main_image'></label>
    <label for='visible'></label>
    <label for='price'>Prezzo a notte</label>
    <label for='description'>Breve descrizione dell'appartamento</label>
    <label for='services_id'></label>





















    <label for="name">Name</label>
    <input v-model="store.newMovie.name" type="text" name="name">
        <br>
    <label for="year">Year</label>
    <input v-model="store.newMovie.year" type="number" name="year">
        <br>
    <label for="cashout">Cashout</label>
    <input v-model="store.newMovie.cashout" type="number" name="cashout">
        <br>
    <label for="genre">Genre</label>
    <select name="genre_id" v-model="store.newMovie.genreID">
            <option v-for="genre in store.genreList" :value="genre.id">
                {{ genre.name }}
            </option>    
    </select>
        <br>
    <h6>Tags</h6>
    <ul>
        <li v-for="tag in store.tagList">
            <input type="checkbox" :name="store.newMovie.tags" v-model="store.newMovie.tags" :value="tag.id">
            <label for="tags">{{ tag.name }}</label>
        </li>
    </ul>
    <input type="submit" @click.prevent="createMovie()">
      </form>
</template>
<style lang="scss" scoped>
@use '../styles/general.scss' as *;

</style>



