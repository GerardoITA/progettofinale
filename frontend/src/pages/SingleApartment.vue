<script>
import axios from 'axios';
import { store } from '../store';
import Apartment from '../components/Apartment.vue';

export default {
    name: "SingleApartment",
    components: {
        Apartment
    },
    data() {
        return {
            store,
            currentId: this.$route.params.id,
            SingleApartmentAPI: `${store.AllApartmentsAPI}/${this.$route.params.id}`,
        }
    },
     methods: {
     },
     mounted() {
        
         axios.get(this.SingleApartmentAPI)
             .then(res => {
                 store.Apartment = res.data.response.data;
 
             }); 
     }
    }

</script>



<template>

  <div class="contenitore">
        <Apartment
        :nome="store.Apartment?.apartments?.title"
        :id="store.Apartment?.apartments?.id"
        :immagine="store.Apartment?.apartments?.id"

        >
            
        'title' => 'required|string|min:0|max:128',
        'rooms' => 'required|integer|min:0',
        'beds' => 'required|integer|min:0',
        'bathrooms' => 'required|integer|min:0',
        'square_meters' => 'required|integer|min:0',
        'address' => 'required|string|min:0|max:128',
        'latitude' => 'required|string|min:0|max:16',
        'longitude' => 'required|string|min:0|max:16',
        'main_image' => 'required|string|min:0|max:128',
        'visible' => 'required|boolean',
        'price' => 'required|integer|min:0',
        'description' => 'string',
        'services_id' => 'nullable|array',
        'user_id' => 'nullable|array',
        </Apartment>
        <div class="edit">
            <form action="POST">
                <label for="title">Nome dell'appartamento</label>
                <input type="text" name="title" v-model="store.NewApartment.title">
                <br>
                <label for="rooms">Stanze</label>
                <input type="number" name="rooms" v-model="store.NewApartment.rooms">
                <br>
                <label for="beds">Letti</label>
                <input type="number" name="beds" v-model="store.NewApartment.beds">
                <br>
                <label for="bathrooms">Bagni</label>
                <input type="number" name="bathrooms" v-model="store.NewApartment.bathrooms">
                <br>
                <label for="square_meters">Letti</label>
                <input type="number" name="square_meters" v-model="store.NewApartment.square_meters">
                <br>
                <label for="address">Indirizzo</label>
                <input type="text" name="address" v-model="store.NewApartment.address">
                <br>
                <label for="price">Prezzo</label>
                <input type="number" name="price" v-model="store.NewApartment.price">
                <br>
                <label for="description">Descrizione</label>
                <input type="number" name="description" v-model="store.NewApartment.description">
                <br>
                <label>Services</label>
                <br>
               
            </form>
        </div>
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