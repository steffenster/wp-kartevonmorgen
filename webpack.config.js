/*
* @Author: Steffen Peschel
* @Date:   2018-09-03 02:00:50
* @Last Modified by:   Steffen Peschel
* @Last Modified time: 2018-09-03 02:43:21
*/

// webpack v4
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  entry: {
    wp_kvm: './src/Front/js/main',
    wp_kvm_admin: './src/Admin/js/main-admin'
  },
  output: {
    path: path.resolve(__dirname, './src/assets'),
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.(sass|scss|css)$/,
        use:  [
          // 'style-loader', 
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              minimize: true || {},
              sourceMap: true
            }
          },
          // 'postcss-loader',
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true
            }
          }
        ]
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {}
          }
        ]
      }
    ]
  },
  plugins: [ 
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
  ]
};