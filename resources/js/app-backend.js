require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios)

import Vuelidate from "vuelidate";
Vue.use(Vuelidate);


import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Router-view to mount
import Backend from './layouts/backend/app.vue';

//routes
import routes from './router/backend';
const router = new VueRouter
({
	mode: 'history',
	IinkActiveClass: 'is-active', 
	routes
});


const app = new Vue({
	el: '#admin',
	components:{ Backend },
	router,
});
