
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'


Vue.use(VueRouter);
Vue.use(Vuex);

// const store = new Vuex.Store(StoreData)

const router = new VueRouter({
    mode: 'history',
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
