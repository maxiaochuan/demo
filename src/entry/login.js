/*login*/
'use strict';
var Vue = require('vue');
var vueResource = require('vue-resource');
var vueValidator = require('vue-validator');
var loginCmp = require('../components/login.vue');
Vue.use(vueResource);
Vue.use(vueValidator);

new Vue({
    el: 'body',
    components: {
        'mxc-login': loginCmp
    }
});