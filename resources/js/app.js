/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);


let routes = [
    // { path: '/messages', component: require('./components/messages.vue').default},
    // { path: '*', component: require('./components/404Page.vue').default}
  ];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});
window.Fire = new Vue();

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('side-bar', require('./components/Sidebar.vue').default);
Vue.component('chat-box', require('./components/Chat.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
