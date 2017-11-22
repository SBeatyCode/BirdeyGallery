let path = require('path');

module.exports = {
    entry: "./app-components/js/script.js",
    output: {
        path: path.resolve(__dirname, "./js"),
        filename: "script.js"
    },
    module: {
        loaders: [
            {
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                },
                test: /\.js$/,
                exclude: /node-modules/
            }
        ]
    }
}