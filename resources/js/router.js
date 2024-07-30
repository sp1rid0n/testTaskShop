import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/CatalogPage.vue"),
    },
    {
        path: "/product/:id",
        name: "product",
        component: () => import("./pages/ProductPage.vue"),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});