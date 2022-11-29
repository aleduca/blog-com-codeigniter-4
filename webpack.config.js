const path = require('path');

module.exports = {
     mode: 'development',
     devtool: process.env.NODE_ENV == 'development' ? 'source-map' : '',
     entry: {
          fragment: ['./public/assets/js/fragment.js'],
     },
     output: {
          path: path.resolve(__dirname, 'public/assets/js/build'),
          filename: '[name].js',
     },
     module: {
          rules: [
               {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: 'babel-loader',
               },
          ],
     },
};
