const path = require('path');

module.exports = {
  entry: path.join(__dirname, 'resources/js/app.js'),
  output: {
    path: path.join(__dirname, 'public/js'),
    filename: 'app.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query: {
          presets: ['env']
        }
      }
    ]
  },
  resolve: {
    modules: [path.join(__dirname, 'resources'), 'node_modules'],
    extensions: ['.js'],
    alias: {
      vue: 'vue/dist/vue.esm.js' //npm installしたvueはtenmpate機能のないランタイム限定ビルドなので、こっちを使うようエイリアスを貼る
    }
  }
};