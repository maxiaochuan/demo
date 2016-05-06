/*home*/
'use strict';
var Vue = require('vue');
var vueResource = require('vue-resource');
var vueValidator = require('vue-validator');
var homeComponent = require('../components/home.vue');
Vue.use(vueResource);
Vue.use(vueValidator);

new Vue({
    el: 'body',
    components: {
        'v-home': homeComponent
    }
});