<template>
    <div>
        <h4>Выгрузка отчета</h4>
        <input type="radio" value="json" v-model="typeReport">
        <label>JSON</label>
        <input type="radio" value="csv" v-model="typeReport">
        <label>CSV</label>
        <br>
        <button @click.prevent="loadReport">Скачать</button>
    </div>
    <div>
        <h1>Каталог</h1>
    </div>
    <Catalog></Catalog>
</template>

<script>
    import axios from "axios";
    import Catalog from "../components/Catalog.vue";
    
    export default {
        components: {
            Catalog
        },
        data: () => ({
            typeReport: ''
        }),
        methods: {
            loadReport() {
                axios.get('/api/reports/purchases/' + this.typeReport)
                    .then(response => {
                        var fileURL = window.URL.createObjectURL(new Blob([response.request.response]));
                        var fileLink = document.createElement('a');

                        fileLink.href = fileURL;
                        fileLink.setAttribute('download', response.headers["content-disposition"].split('=')[1]);
                        document.body.appendChild(fileLink);

                        fileLink.click();
                })
            }
        }
    }
</script>