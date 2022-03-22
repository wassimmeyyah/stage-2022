import { options } from "laravel-mix";
import Vue from 'vue'
import App from './App.vue'
import VueGeolocation from 'vue-browser-geolocation'


Vue.config.productionTip = false
Vue.use(VueGeolocation)

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyAIzaSyB__S_dTv0wws8adPnqu3nzdASaMI3stMI'
    }

})

const app = new Vue({
    el: '#app',
});