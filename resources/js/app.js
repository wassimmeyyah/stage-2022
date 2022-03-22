<<<<<<< HEAD
import {options} from "laravel-mix";
=======
import { options } from "laravel-mix";
>>>>>>> ccc297bc72292c3d0c5508e30806f886ea93a050
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
<<<<<<< HEAD
        key:'AIzaSyAIzaSyB__S_dTv0wws8adPnqu3nzdASaMI3stMI'
=======
        key: 'AIzaSyAIzaSyB__S_dTv0wws8adPnqu3nzdASaMI3stMI'
>>>>>>> ccc297bc72292c3d0c5508e30806f886ea93a050
    }

})

const app = new Vue({
    el: '#app',
<<<<<<< HEAD
});


=======
});
>>>>>>> ccc297bc72292c3d0c5508e30806f886ea93a050
