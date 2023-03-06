import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Create from './pages/Create.vue'
import SingleApartment from './pages/SingleApartment.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/create', component: Create },
        { path: '/apartments/:id', component: SingleApartment },
    ]
})

export default router