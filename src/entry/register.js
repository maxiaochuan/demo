/*register*/
'use strict';
var Vue = require('vue');
var vueResource = require('vue-resource');
var vueValidator = require('vue-validator');
var registerComponents = require('../components/register.vue');
Vue.use(vueResource);
Vue.use(vueValidator);

new Vue({
    el: '#wrapper',
    components: {
        'v-register': registerComponents
    }
});