<script>
import { store } from '../store';

export default {
    name: "Apartment",
    props: {
        nome: String,
        id: Number,

    },
    data() {
        return {
            store
        }
    },
}
</script>

<template>
    <div class="apartment">
        <div class="apartment_info">
            <h4> nome = {{ nome }} </h4>
            <h4> id = {{ id }} </h4>    
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

    }
 }
</style>