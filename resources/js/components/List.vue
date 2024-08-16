<template>
    <ul v-for="category in catalog" :key="category.id">
        <li>
            {{ category.name }}
            <FormChangeCategory :categories="categories" :category="category"/>
        </li>
        <List v-if="category.children > []" :catalog="category.children" :categories="categories"></List>
        <BlockCards v-if="category.products > []" 
            :products="category.products" 
            :category="category" />
    </ul>
</template>

<script>
    import BlockCards from './BlockCards.vue';
    import FormChangeCategory from './FormChangeCategory.vue';
    export default {
        components: {
            BlockCards,
            FormChangeCategory
        },
        props: {
            catalog: {
                type: Array,
                default: []
            },
            categories: {
                type: Array,
                default: []
            },
        }
    }
</script>

<style scoped>
    li {
        margin-bottom: 20px;
    }
</style>
