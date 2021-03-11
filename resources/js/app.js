import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

require('./bootstrap');

window.Vue = require('vue').default;

//All vue components under components directory will automatically registered
//Not need to register components like usual
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Take note: require.context's arguments must be static and not be variables.
//Refer
//https://github.com/webpack/webpack/issues/4772#issuecomment-358573955
var components = require.context('./components', true, /\.vue$/i);
components.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], components(key).default));

//vue-bootstrap
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

const app = new Vue({
    el: '#app',
});
