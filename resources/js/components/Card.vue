<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ name }}</h4>
        </div>
        <div class="card-body">
            <p>{{ price }}</p>
        </div>
        <div class="card-footer">
            <router-link :to="{ name: 'product', params: { id: id } }"  class="btn">Подробнее...</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                default: "NULL"
            },
            price: {
                type: Number,
                default: 0
            },
            id: {
                type: Number,
                default: 0
            }
        }
    }
</script>

<style scoped>
    .card {
        border: 1px solid gray;
        width: 40%;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    .card-title {
        text-align: center
    }
    p {
        text-align: center
    }
    .card-footer {
        display: flex;
    }
    .btn {
        height: 20px;
        border: 3px solid gray;
        border-radius: 5px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 5px;
        color: black;
    }
</style>