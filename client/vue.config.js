module.exports = {
  // local dev
  publicPath: process.env.NODE_ENV === 'production'
    ? '/client/dist/'
    : '/'
  // corsair
  // publicPath: process.env.NODE_ENV === 'production'
  //   ? '/hsef/client/dist/'
  //   : '/'
}