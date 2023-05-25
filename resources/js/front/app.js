import './bootstrap.js';

import Alpine from 'alpinejs';

import { createApp } from "vue";
import router from './router'
import store from './store'
import TestComponent from "./components/TestComponent.vue";


const app = createApp();
app.component('test', TestComponent);
app.use(router).use(store)
app.mount('#app');
window.Alpine = Alpine;

Alpine.start();
