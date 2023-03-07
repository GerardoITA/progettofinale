import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Create from './pages/Create.vue'
import SingleApartment from './pages/SingleApartment.vue'
import Register from './pages/Register.vue'
import Login from './pages/Login.vue'
import Dashboard from './pages/Dashboard.vue'




const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/create', component: Create },
        { path: '/apartments/:id', component: SingleApartment },
        { path: '/register', component: Register },
        { path: '/login', component: Login },
        { path: '/dashboard', component: Dashboard },


    ]
})

export default router