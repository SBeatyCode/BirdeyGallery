let path = require('path');

module.exports = {
    entry: "./app-components/js/script.js",
    output: {
        path: path.resolve(__dirname, "./js"),
        filename: "script.js"
    }
}