import "./bootstrap";
import router from "./router";
import { createApp } from "vue";

import App from "./App.vue";
// App.component('catalog-list', require('./components/List.vue').default);

createApp(App).use(router).mount("#app");
