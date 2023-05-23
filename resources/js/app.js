import './bootstrap';
import "../css/app.css"

import {createApp} from 'vue';
import { createRouter, createWebHistory } from 'vue-router';


// import routes
import routes from './router/index.js';

// create router 
const router = createRouter({
    history: createWebHistory(),
    routes
  });

import App from './App.vue'

createApp(App)
.use(router)
.mount("#app")