const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/assets/js/auth-top-layout.js', 'public/js')
    .js('resources/assets/js/auth-login-layout.js', 'public/js')
    .js('resources/assets/js/layout.js', 'public/js');

mix.sass('resources/assets/sass/auth.scss', 'public/css')
    .sass('resources/assets/sass/common.scss', 'public/css')
    .sass('resources/assets/sass/main.scss', 'public/css')
    .sass('resources/assets/sass/styles.scss', 'public/css')
    .sass('resources/assets/sass/bootstrap.scss', 'public/css')
