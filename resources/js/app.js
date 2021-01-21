import Vue from 'vue';
import routes from './router/index';
require('./bootstrap');


//v-form 
import {HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//toster notificition
import CxltToastr from 'cxlt-vue2-toastr'
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'

var toastrConfigs = {
    position: 'top right',
    showDuration: 500,
    progressBar: true,
    closeButton: true,
    showMethod: 'bounceIn',
    hideMethod: 'bounceOut',
    showDuration: 500,
    hideDuration: 1000,
    timeOut: 5000,

}

Vue.use(CxltToastr, toastrConfigs)


//window.Vue = require('vue').default;
Vue.component('app-header', require('./components/Header.vue').default);

const app = new Vue({
    el: '#app',
    router: routes,
});