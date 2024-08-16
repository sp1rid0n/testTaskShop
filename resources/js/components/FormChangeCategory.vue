<template>
    <select v-model="selected">
        <option v-for="option in categories" :value="option">
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
            category: {
                type: Object,
                default: null
            }
        },
        data: () => ({
            selected: null,
        }),
        methods: {
            updateCategory() {
                axios.put('/api/category/' + this.category + '/change-category/' + this.selected)
                .then(res => {
                    alert('Категория-родитель успешна изменена, пожалуйста перезагрузите страницу');
                })
                .catch(err => {
                    alert('Произошла ошибка');
                });
            }
        }
    }
</script>