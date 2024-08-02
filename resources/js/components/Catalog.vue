<template>
        <List :catalog="catalog" :categories="categories"></List>
</template>

<script>
    import axios from 'axios';
    import List from './List.vue';
    
    export default {
        components: {
            List,
        },
        data: () => ({
            catalog: [],
            categories: [],
        }),
        mounted() {
            this.loadCatalog();
            this.loadCategories();
        },
        methods: {
            loadCatalog() {
                axios.get('/api/catalog')
                .then(res => {
                    this.catalog = res.data;
                })
            },
            loadCategories() {
                axios.get('/api/categories')
                .then(res => {
                    this.categories = res.data;
                })
            },
        },
    }
</script>

<style scoped>

</style>