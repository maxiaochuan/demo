var webpack = require('webpack');

module.exports = {
    entry: {
        login: './src/entry/login.js',
        register: './src/entry/register.js',
        home: './src/entry/home.js'
    },
    output: {
        filename: "[name].js"
    },
    module: {
        loaders: [
            {test: /\.vue$/, loader: "vue"}
        ]
    }
};