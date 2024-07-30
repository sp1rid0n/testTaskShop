<template>
        <List :categories="categories"></List>
</template>

<script>
    import axios from 'axios';
    import List from './List.vue';
    
    export default {
        components: {
            List,
        },
        data: () => ({
            categories: [],
        }),
        mounted() {
            this.loadCategories();
        },
        methods: {
            loadCategories() {
                axios.get('/api/catalog')
                .then(res => {
                    this.categories = res.data;
                })
            }
        },
    }
</script>

<style scoped>

</style>