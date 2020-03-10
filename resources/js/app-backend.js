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

Vue.filter('truncate', function (value, start, end) {
  if (!value) return ''
  return value = value.substring(start, end)
})

import moment from 'moment'
Vue.prototype.moment = moment
//Vue.use(require('vue-moment'));
Vue.filter('format', function (value, display) {
  if (!value) return ''
  return moment(value).format(display);
})

const app = new Vue({
	el: '#admin',
	components:{ Backend },
	router,
});
