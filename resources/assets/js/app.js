
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import StoreData from './store/Store'
import Vuex from 'vuex'
import axios from 'axios'
import {routes} from './routes'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';
Vue.use(ElementUI, { locale });


// require('./components.js')

Vue.component('view_fa', require('./components/admin/advisors/IndexAdmin'));
Vue.component('view_clients', require('./components/admin/clients/ViewClients'));

Vue.use(VueRouter);
Vue.use(Vuex);


const store = new Vuex.Store(StoreData)

const router = new VueRouter({
    routes,
    mode: 'history',
});


const app = new Vue({
    el: '#admin',
    router,
    store,
    axios,
});
