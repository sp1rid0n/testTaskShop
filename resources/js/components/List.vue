<template>
    <ul v-for="category in categories" >
        <li>{{ category.name }}</li>
        <List v-if="category.children > []" :categories="category.children"></List>
        <BlockCards v-if="category.products > []" :products="category['products']"></BlockCards>
    </ul>
</template>

<script>
    import BlockCards from './BlockCards.vue';
    export default {
        components: {
            BlockCards,
        },
        props: {
            categories: {
                type: Array,
                default: []
            }
        },
    }
</script>
