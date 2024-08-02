<template>
    <select v-model="selected">
        <option v-for="option in categories" :value="option.id">
            {{ option.name }}
        </option>
    </select>
    <button @click.prevent="updateCategory">Изменить родительскую категорию</button>
</template>

<script>
    export default {
        props: {
            categories: {
                type: Array,
                default: []
            }, 
            categoryId: {
                type: Number,
                default: 0
            }
        },
        data: () => ({
            selected: '',
        }),
        methods: {
            updateCategory() {
                axios.put('/api/category/' + this.categoryId + '/change-category/' + this.selected)
                .then(res => {
                    if (res.data.status) {
                        alert(res.data.message);
                        this.$emit('loadCatalog');
                    } else {
                        alert(res.data.message);
                    }
                });
            }
        }
    }
</script>