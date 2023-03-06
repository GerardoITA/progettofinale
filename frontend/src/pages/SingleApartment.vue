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
        }
    },
    mounted() {
        axios.get(store.AllApartmentsAPI)
            .then(res => {
                store.ApartmentList = res.data.response.apartments;

            }); // Rifare il get con un find invece che delegare al prop, più efficiente
    }
}

</script>



<template>

    <div class="contenitore">
        <Apartment
        :nome="store.ApartmentList.find(e => e.id == currentId)?.title"
        :id="store.ApartmentList.find(e => e.id == currentId)?.id"
        :immagine="store.ApartmentList.find(e => e.id == currentId)?.main_image"

        >
            
        </Apartment>
        
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