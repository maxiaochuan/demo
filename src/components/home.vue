<style lang="less">
    @import "../less/main.less";
</style>
<template>
    <div id="wrapper">
        <div id="container">
            <v-side></v-side>
        </div>
    </div>
</template>
<script>
    'use strict';
    var sideComponent = require('./side.vue');
    module.exports = {
        components : {
            'v-side': sideComponent
        }
    }
</script>