<style>
    @import "../less/main.less";
</style>
<template>
    <div id="wrapper">
        <div id="container">
            <mxc-login></mxc-login>
        </div>
    </div>
</template>
<script>
    var loginCmp = require('./auth/loginForm.vue');
    module.exports = {
        components: {
            'mxc-login': loginCmp
        }
    };
</script>