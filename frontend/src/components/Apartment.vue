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
        imageData(idApartment) {
            axios.get(this.apiImage + idApartment)
                .then(res => {
                    this.images = res.data.images
                })
                .catch(err => {
                    console.error(err);
                })
        },
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
        storeImage(e) {
            e.preventDefault();

            let newImage = {
                'title': this.titleImage,
                'description': this.descriptionImage,
                'image': this.image.name,
                'apartment_id': this.id
            };

            console.log(newImage);

            axios.post(this.apiImage + 'store', newImage)
                .then(res => {
                    const data = res.data;
                    const success = res.success;

                    if (success) {
                        console.log(success);
                    }
                })
                .catch(err => {
                    console.error(err);
                })
        }, onChange(e) {
            this.image = e.target.files[0];
        }, storeData(e) {
            e.preventDefault();
            let currentObj = this;

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            formData.append('title', this.titleImage);
            formData.append('description', this.descriptionImage);
            formData.append('image', this.image);
            formData.append('apartment_id', this.id);

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