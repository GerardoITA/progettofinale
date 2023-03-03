import { reactive } from 'vue';

export const store = reactive({

    AllApartmentsAPI: "",
    ApartmentList: [
        {
            title: "Hello",
            id: "1",
        },
        {
            title: "Hi",
            id: "3",
        },
        {
            title: "Ciao",
            id: "5",
        }

    ],


}); 
