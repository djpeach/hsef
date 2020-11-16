module.exports = {
  "publicPath": process.env.NODE_ENV === 'production' ? "/hsef/client/dist" : '/',
  "transpileDependencies": [
    "vuetify"
  ],
  configureWebpack: {
    module: {
      rules: [
        {
          test: /\.(csv|xlsx|xls)$/,
          use: [
            {
              loader: 'file-loader'
            }
          ]
        }
      ]
    }
  }
}