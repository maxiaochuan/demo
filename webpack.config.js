var webpack = require('webpack');

module.exports = {
    entry: {
        login: './src/entry/login.js',
        register: './src/entry/register.js',
        home: './src/entry/home.js'
    },
    output: {
        path: "./public/assets/js",
        publicPath: "./public/assets/js",
        filename: "[name].js"
    },
    module: {
        loaders: [
            {test: /\.vue$/, loader: "vue"}
        ]
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
    ]
};