var config = require('./webpack.base.config.js');

config.devtool = 'eval-source-map';
config.output.publicPath = "assets/js/";

config.devServer = {
    contentBase: '/home/maxc/www/demo/src',
    noInfo: true
};

module.exports = config;