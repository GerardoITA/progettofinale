<script>
import axios from 'axios';
import { store } from '../store';

export default {
    name: "Apartment",
    props: {
        nome: String,
        id: Number,
        immagine: Number,

    },
    data() {
        return {
            store,
            apiImage: 'http://127.0.0.1:8000/api/v1/apartments/image/',
            images: [],
        }
    },
    methods: {
        imageData(idApartment) {
            axios.get(this.apiImage + idApartment)
                .then(res => {
                    this.images = res.data.images
                })
                .catch(err => {
                    console.log(err);
                })
        },
        imgDelete(imageId) {
            axios.delete(this.apiImage + imageId)
                .then(res => {
                    console.log(res);
                    this.imageData(this.id)
                })
                .catch(err => {
                    console.log(err);
                })
        }
    },
    created() {

    },
}
</script>

<template>
    <div>
        
        <div class="apartment">
            <div class="apartment_info">
                <h4> nome = {{ nome }} </h4>
                <h4> id = {{ id }} </h4>    
                <img src="../assets/no-img.jpg" :alt="nome" >
            </div>
            
            
            
        </div>
        <div>
            <button  @click="imageData(id)">Images</button>
            <div v-for="image in images">
                {{ image.id }} - 
               <button @click="imgDelete(image.id)">Delete</button>
            </div>
        </div>
    </div>

</template>

<style lang="scss">
.apartment {
    min-width: 250px;
    min-height: 400px;
    border: 1px solid black;
    border-radius: 25px;
    background-color: lightgrey;
    position: relative;
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;

    .apartment_info {
        width: 80%;
        background-color: antiquewhite;

        img {
            width: 100%;
            height: auto;
        }
    }
}
</style>