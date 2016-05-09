var gulp = require('gulp');
var merge = require('merge-stream');
var named = require('vinyl-named');
var webpack = require('webpack-stream');
var webpackProdConfig = require('./src/conf/webpack.prod.config.js');


gulp.task('webpack:build', function () {
    return gulp.src('./src/entry/*.js')
        .pipe(named())
        .pipe(webpack(webpackProdConfig))
        .pipe(gulp.dest('./public/assets/js/'));
});

gulp.task('html:copy', function () {
    var home = [
        './src/home.html'
    ];
    var auth = [
        './src/login.html',
        './src/register.html'
    ];
    var homeCopy = gulp.src(home)
        .pipe(gulp.dest('./templates/home'));

    var authCopy = gulp.src(auth)
        .pipe(gulp.dest('./templates/auth'));

    return merge(homeCopy, authCopy);
});

gulp.task('build', ['webpack:build', 'html:copy']);