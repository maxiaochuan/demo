<style>
    @import "../less/main.less";
</style>
<template>
    <div id="wrapper">
        <div id="container">
            <mxc-login-form></mxc-login-form>
        </div>
    </div>
</template>
<script>
    var loginForm = require('./auth/loginForm.vue');
    module.exports = {
        components: {
            'mxc-login-form': loginForm
        }
    };
</script>