/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



// require('./popper.min');
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

Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('carousel', require('./components/Carousel.vue').default);
Vue.component('three-steps', require('./components/ThreeSteps.vue').default);
Vue.component('prevision', require('./components/Prevision.vue').default);
Vue.component('frequentlyquestions', require('./components/FrequentlyQuestions.vue').default);
Vue.component('featuredplans', require('./components/FeaturedPlans.vue').default);
Vue.component('specialists', require('./components/Specialists.vue').default);
Vue.component('voluntary', require('./components/Voluntary.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('copyright', require('./components/Copyright.vue').default);
Vue.component('featuredprofessionals', require('./components/FeaturedProfessionals.vue').default);
Vue.component('news', require('./components/News.vue').default);
Vue.component('whatsapp', require('./components/Whatsapp.vue').default);
Vue.component('wewerenews', require('./components/WeWereNews.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});
