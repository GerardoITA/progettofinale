import { reactive } from 'vue';

export const store = reactive({

    AllApartmentsAPI: "http://127.0.0.1:8000/api/v1/apartments",
    ApartmentList: [],
    Apartment: [],
    NewApartment: {
        title: '',
        rooms: '',
        beds: '',
        bathrooms: '',
        square_meters: '',
        address: '',
        latitude: '',
        longitude: '',
        main_image: '',
        visible: '',
        price: '',
        description: '',
        services_id: '',
    }

}); 
