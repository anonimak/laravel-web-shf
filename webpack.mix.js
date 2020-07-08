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
    .sass('resources/sass/frontend/main.scss', 'public/css');


// mix to admin
mix.js('resources/js/app.js', 'public/admin/js')
    .sass('resources/sass/app-admin.scss', 'public/admin/css');
