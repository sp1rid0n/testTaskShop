<template>
    <div class="sortMenu">
        <button @click.prevent="sortProducts('price', 'asc')">Цена (от меньшей к большей)</button>
        <button @click.prevent="sortProducts('price', 'desc')">Цена (от большей к меньшей)</button><br>
        <button @click.prevent="sortProducts('name', 'asc')">Название (от А до Я)</button>
        <button @click.prevent="sortProducts('name', 'desc')">Название (от Я до А)</button>
    </div>
    <div class="cards">
        <card v-for="product in sortedProducts" 
            :name="product.name"
            :price="product.price"
            :id="product.id"
        />
    </div>
</template>

<script>    
    import axios from 'axios';
    import Card from './Card.vue';
    
    export default {
        components: {
            Card,
        },
        props: {
            products: {
                type: Array,
                default: []
            },
            category: {
                type: Object,
                default: null
            }

        },
        data: () => ({
            sortField: '',
            sortDirection: '',
            sortedProducts: []
        }),
        mounted() {
            this.sortedProducts = this.products;
        },
        methods: {
            sortProducts(field, direction) {
                axios.get('/api/products/sort', {
                    params: {
                        field: field,
                        direction: direction,
                        category: this.category
                    }
                })
                .then(res => {
                    this.sortedProducts = res.data;
                })
            }
        }
    }
</script>

<style scoped>
    .cards {
        display: flex; 
        flex-wrap: nowrap;
    }
    .sortMenu {
        display: block;
        border: 1px solid gray;
        margin-bottom: 10px;
    }
    button {
        margin: 5px;
    }
</style>