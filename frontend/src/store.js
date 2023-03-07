import { reactive } from 'vue';

export const store = reactive({

    AllApartmentsAPI: "http://127.0.0.1:8000/api/v1/apartments",
    RegisterAPI: "http://127.0.0.1:8000/api/register",
    ApartmentList: [],
    Apartment: [],
    NewApartment: {
        title: '',
        rooms: '',
        beds: '',
        bathrooms: '',
        square_meters: '',
        address: '',
        latitude: 'ASDASD',
        longitude: 'FGHFGH',
        main_image: 'bob',
        visible: true,
        price: '',
        description: '',
        services_id: '',
    }


}); 
