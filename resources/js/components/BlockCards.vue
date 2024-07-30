<template>
    <div class="sortMenu">
        <button @click="sortParam='priceMin'">Цена (от меньшей к большей)</button>
        <button @click="sortParam='priceMax'">Цена (от большей к меньшей)</button>
    </div>
    <div class="cards">
        <card v-for="product in sorted" 
            :name="product.name"
            :price="product.price"
            :id="product.id"
        />
    </div>
</template>

<script>
    import Card from './Card.vue';
    
    export default {
        components: {
            Card,
        },
        props: {
            products: {
                type: Array,
                default: []
            }
        },
        data: () => ({
            sortParam: ""
        }),
        computed: {
            sorted () {
                switch(this.sortParam){
                    case 'priceMin': return this.products.sort(sortByPriceMin);
                    case 'priceMax': return this.products.sort(sortByPriceMax);
                    default: return this.products;
                }
            }
        }
    }
    const sortByPriceMin = (d1, d2) => (d1.price >= d2.price) ? 1 : -1;
    const sortByPriceMax = (d1, d2) => (d1.price <= d2.price) ? 1 : -1;
</script>

<style scoped>
    .cards {
        display: flex; 
        flex-wrap: nowrap;
    }
    .sortMenu {
        display: block;
        width: 100%;
    }
    button {
        margin: 5px;
    }
</style>