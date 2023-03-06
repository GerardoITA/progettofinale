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
            SingleApartmentAPI: `${store.AllApartmentsAPI}/1`,
        }
    },
     methods: {
         test() {
             console.log(this.currentId);
             console.log(this.SingleApartmentAPI);
             console.log(store.Apartment)
         }
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
            
        </Apartment>
        <button @click="test">Oogabooga</button>
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