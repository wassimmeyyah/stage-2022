require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'base64:DiEpWxJNNFIwN9Ed0Y3W7w7C2gB/rV6FrYYlkwxQRmM='
    }

})

const app = new Vue({
    el: '#app',
});