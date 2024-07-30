<template>
    <div>
        <h1>Редактирование категории товара</h1>
        <router-link to="/"> <-- вернуться... </router-link>
    </div>
    <div>
        <h3>{{ product.name }}</h3>
        <p>{{ product.price }}</p>
        <p>{{ categoryProduct.name }}</p>
    </div>
    <div>
        <select v-model="selected">
            <option v-for="option in categories" :value="option.id">
                {{ option.name }}
            </option>
        </select>
        <button @click.prevent="updateCategory">Изменить категорию</button>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data: () => ({
            product: [],
            categoryProduct: [],
            categories: [],
            selected: '',
            not_found: false
        }),
        mounted() {
            this.loadProduct(this.$route.params.id);
            this.loadCategories();
        },
        methods: {
            loadProduct(id) {
                axios.get('/api/product/' + id)
                .then(res => {
                    this.product = res.data;
                    this.categoryProduct = res.data.category;
                })
                .catch(err => {
                    this.not_found = true;
                })
            },

            loadCategories() {
                axios.get('/api/categories/')
                .then(res => {
                    this.categories = res.data;
                })
                .catch(err => {
                    
                })
            },

            updateCategory() {
                axios.put('/api/products/' + this.product.id + '/move-to-category/' + this.selected)
                    .then(res => {
                        
                    if (res.data.status) {
                        alert(res.data.message);
                        this.loadProduct(this.product.id);
                    } else {
                        alert(res.data.message);
                    }
                });
            }
        }
    }
</script>