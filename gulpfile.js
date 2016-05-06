
var gulp = require('gulp');
var webpack = require('webpack');
var webpackConfig = require('./webpack.config.js');

var src = './src';
var entry = src + '/entry/*.js';
var components = src + '/components/*.vue';
var dist = './public/assets';
var distJS = dist + '/js/';

var tasks = [
    'webpack-dev',
    'watch-webpack'
];
gulp.task('webpack-dev', function (callback) {
    webpack(webpackConfig, function () {
        callback();
    });
});

gulp.task('watch-webpack', function () {
    gulp.watch(components, ['webpack-dev']);
});

gulp.task('default', tasks);