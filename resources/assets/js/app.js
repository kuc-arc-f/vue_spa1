
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
       { path: '/'                   , component: require('./components/Articles/Index.vue') },
       { path: '/articles/show/:id'  , component: require('./components/Articles/show.vue') },
       { path: '/articles/new/'      , component: require('./components/Articles/new.vue') },
       { path: '/tasks'              , component: require('./components/Tasks/Index.vue') },
       { path: '/tasks/new/'         , component: require('./components/Tasks/new.vue') },
       { path: '/tasks/show/:id'     , component: require('./components/Tasks/show.vue') },
       { path: '/tasks/edit/:id'     , component: require('./components/Tasks/edit.vue') },
       { path: '/about', component: require('./components/About.vue') }
    ]
});

const app = new Vue({
    router,
    el: '#app'
});
