require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios)

import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

Vue.filter('truncate', function (value, start, end) {
  if (!value) return ''
  	value = value.toString()
  return value.substring(start, end)
})

import moment from 'moment'
Vue.prototype.moment = moment
//Vue.use(require('vue-moment'));
Vue.filter('format', function (value, display) {
  if (!value) return ''
  return moment(value).format(display);
})

// Router-view to mount
import Frontend from './layouts/frontend/app.vue';

//routes
import routes from './router/frontend';

const router = new VueRouter
({
	mode: 'history',
	IinkActiveClass: 'is-active', 
	routes
});

const app = new Vue({
	el: '#user',
	components:{ Frontend },
	router,
});
