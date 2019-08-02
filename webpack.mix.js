const mix = require('laravel-mix')
require('laravel-mix-tailwind')
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

mix.browserSync({
  proxy: {
    target: 'http://kaki.test',
    server: '/Tutoriels/laravel/tdauce/vuejs/'
  }
})

mix.browserSync('http://127.0.0.1:8000')

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css').version()
  .tailwind()
