const { VueLoaderPlugin } = require('vue-loader')
var path = require('path')
var webpack = require('webpack')

module.exports = {
  mode: 'production',
  entry: { 
    main: './assets/private/vue/main.js',
    dashboard : './assets/private/vue/dashboard.js',
  },
  
  output: {
    path: path.resolve(__dirname, './'),
    publicPath: '/',
    filename: './assets/public/vue/[name].js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: './assets/public/img/default/[name].[ext]'
        }
      },
      { test: /\.(png|woff|woff2|eot|ttf|svg)$/,
         loader: 'url-loader?limit=100000' ,
         options: {
          name: './assets/public/vue/css/fonts/[name].[ext]'
        }
      },
      {
        test: /\.css$/i,
        use: ['style-loader', 'css-loader'],
      },
      {
        test: /\.(scss|sass)$/,
        use: ['style-loader', 'css-loader','sass-loader']
      },
      {
        test: /\.vue$/,
        use: ['vue-loader']
      },
      
    ]
  },
  plugins:[
    new VueLoaderPlugin()
  ],
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    },
    extensions: ['*', '.js', '.vue', '.json']
  },
  devServer: {
    historyApiFallback: true,
    noInfo: true,
    port: 8080,
    host: '0.0.0.0'
  },
  performance: {
    hints: false
 },
  
  devtool: '#eval-source-map'
}

if (process.env.NODE_ENV === 'production') {
  module.exports.devtool = '#source-map'
  // http://vue-loader.vuejs.org/en/workflow/production.html
  module.exports.plugins = (module.exports.plugins || []).concat([
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
    new webpack.optimize.UglifyJsPlugin({
      sourceMap: true,
      compress: {
        warnings: false
      }
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: true
    })
  ])
}