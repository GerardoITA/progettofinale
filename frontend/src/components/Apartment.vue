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

            titleImage: '',
            descriptionImage: '',
            image: '',
            idApartment: ''
        }
    },
    methods: {
        // SHOW IMAGE
        imageData(idApartment) {
            axios.get(this.apiImage + idApartment)
                .then(res => {
                    this.images = res.data.images
                })
                .catch(err => {
                    console.error(err);
                })
        },
        // DELETE IMAGE
        imgDelete(imageId) {

            axios.delete(this.apiImage + imageId)
                .then(res => {
                    console.log(res);
                    this.imageData(this.id)
                })
                .catch(err => {
                    console.error(err);
                })
        },
        // convert format image in file
        onChange(e) {
            this.image = e.target.files[0];
        },
        // STORE IMAGE
        storeData(e) {
            e.preventDefault();
            let currentObj = this;

            // change config content
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            // import file
            let formData = new FormData();
            formData.append('title', this.titleImage);
            formData.append('description', this.descriptionImage);
            formData.append('image', this.image);
            formData.append('apartment_id', this.id);

            // send to axios
            axios.post(this.apiImage + 'store', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
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
<<<<<<< HEAD
            <!-- btn SHOW image -->
            <button  @click="imageData(id)">Images</button>
            <div v-for="image in images">
                {{ image.id }} - 

                <!-- btn DELETE -->
               <button @click="imgDelete(image.id)">Delete</button>
            </div>
        </div>


        <form method="post" enctype="multipart/form-data">

            <!-- input title -->
            <label for="title">Image title</label>
            <input type="text" v-model="titleImage" name="title">

            <!-- input description -->
            <label for="description">Image description</label>
            <input type="text" v-model="descriptionImage" name="description">

            <!-- input image -->
=======
            <button  @click="imageData(id)">Images</button>
            <div v-for="image in images">
                {{ image.id }} - 
               <button @click="imgDelete(image.id)">Delete</button>
            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Image title</label>
            <input type="text" v-model="titleImage" name="title">

            <label for="description">Image description</label>
            <input type="text" v-model="descriptionImage" name="description">

>>>>>>> crudImage
            <label for="image">Image title</label>
            <input type="file" v-on="image" name="image" v-on:change="onChange">

            <input type="submit" value="ADD NEW IMAGE" @click="storeData">
        </form>
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