/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap.bundle.min');
require('./jquery.easing.min');
require('./scripts');
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/* Global Components */
Vue.component('navbar-component', require('./components/Global/Navbar.vue').default);
Vue.component('whatsapp-component', require('./components/Global/Whatsapp.vue').default);
Vue.component('footer-component', require('./components/Global/Footer.vue').default);

/* Section Components */
Vue.component('home-component', require('./components/Home/Main.vue').default);
Vue.component('about-component', require('./components/About/Main.vue').default);
Vue.component('work-component', require('./components/Work/Main.vue').default);
Vue.component('professional-component', require('./components/Professional/Main.vue').default);
Vue.component('detail-component', require('./components/Professional/DetailProfessional.vue').default);
Vue.component('specialist-component', require('./components/Specialist/Main.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});
