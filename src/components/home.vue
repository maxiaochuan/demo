<style lang="less">
    @import "../less/main.less";

    #canvas {
        height: 200px;
        width: 600px;
    }
</style>
<template>
    <div id="wrapper">
        <div id="container">
            <v-side></v-side>
            <div style="margin-left: 200px;">
                <div id="canvas" v-on:load="showCanvas()"></div>
            </div>
        </div>
    </div>
</template>
<script>
    'use strict';
    var charts = require('echarts');
    var sideComponent = require('./side.vue');
    module.exports = {
        data: function () {
          return {
              coat: ["衬衫", "羊毛衫", "雪纺衫", "裤子", "高跟鞋", "袜子"]
          };
        },
        components: {
            'v-side': sideComponent
        },
        methods: {
            showCanvas: function () {
                window.console.log(1);
                var self = this;
                var canvas = charts.init(document.getElementById('canvas'));
                canvas.setOption({
                    title: {text: '演示'},
                    tooltip: {},
                    xAxis: {
                        data: self.coat
                    },
                    yAxis: {},
                    series: [
                        {
                            name: '销量',
                            type: 'bar',
                            data: [5, 20, 36, 10, 10, 20]
                        }
                    ]
                });
            }
        },
        ready: function () {
            this.showCanvas();
        }
    };

</script>