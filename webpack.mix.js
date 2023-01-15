const mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/dynamic_validator.js', 'public/js/dynamic_validator.js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/scss/custom.scss', 'public/css/custom')
  .css('resources/css/tailwind.css', 'public/css/tailwind.css')
  .css('resources/css/data_table.css', 'public/css/data_table.css')
  .copy(
    'node_modules/datatables.net-dt/css/jquery.dataTables.css',
    'public/css/vendor/datatables/',
  )
  .copy(
    'node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/js/vendor/datatables/',
  )
  .sourceMaps()

mix.copy(
  'node_modules/jquery-validation/dist/jquery.validate.min.js',
  'public/js/vendor/validator/jquery.validate.min.js',
)
