module.exports = {
  content: [
    './htdocs/**/*.{html,js.php}',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  plugins: [
    require('tw-elements/dist/plugin')],
};