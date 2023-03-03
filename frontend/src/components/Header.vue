<script>
export default {
    name: "Header",
    data() {
        return {
             links: [
                {
                    name: 'Home',
                    route: '/',
                },
                {
                    name: 'Create',
                    route: '/create',
                },
            ]
        }
    }
}
</script>

<template>
    <nav class="topBar">
        <ul>
            <li v-for="link, number in links" :key="number">
                <router-link class="routerLink" :to="link.route">
                    {{ link.name }}
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<style lang="scss" scoped>
@use '../styles/general.scss' as *;
.topBar {
    padding: 2rem 0;
    display: flex;
    justify-content: space-between;
    align-items: center;

    ul {
        display: flex;
        gap: 30px;
        
        li {
            text-decoration-style: none;
            list-style-type: none;
            font-size: 1.5rem;
            padding-bottom: 1rem;
            box-sizing: content-box;
            &:hover {
                    border-bottom: 0.125rem solid black;
                }
            
        }
    }
}


</style>