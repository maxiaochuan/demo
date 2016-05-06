/*login*/
'use strict';
var Vue = require('vue');
var vueResource = require('vue-resource');
var vueValidator = require('vue-validator');
var loginComponents = require('../components/login.vue');
Vue.use(vueResource);
Vue.use(vueValidator);

new Vue({
    el: '#wrapper',
    components: {
        'v-login': loginComponents
    }
});