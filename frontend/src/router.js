import { createRouter, createWebHistory } from 'vue-router'
import Home from './pages/Home.vue'
import Home2 from './pages/Home2.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/home2', component: Home2 },
    ]
})

export default router