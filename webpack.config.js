const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

const isProduction = process.env.NODE_ENV === 'production'

const stylesHandler = isProduction
  ? MiniCssExtractPlugin.loader
  : 'style-loader'

const config = {
  entry: {
    slider: './Resources/Public/JavaScript/Src/slider.js',
    main: './Resources/Public/JavaScript/Src/main.ts',
  },
  output: {
    filename: '[name].bundle.js',
    path: path.resolve(__dirname, 'Resources/Public/JavaScript/Dist'),
    clean: true,
  },
  plugins: [
    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
  ],
  module: {
    rules: [
      {
        test: /\.(ts|tsx)$/i,
        loader: 'ts-loader',
      },
      {
        test: /\.(js|jsx)$/i,
        loader: 'babel-loader',
      },
      {
        test: /\.css$/i,
        use: [stylesHandler, 'css-loader'],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [stylesHandler, 'css-loader', 'sass-loader'],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: 'asset',
      },

      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
  resolve: {
    extensions: ['.ts', '.js']
  }
}

module.exports = () => {
  if (isProduction) {
    config.mode = 'production'

    config.plugins.push(new MiniCssExtractPlugin())
  } else {
    config.mode = 'development'
    config.devtool = 'source-map'
  }

  return config
}
