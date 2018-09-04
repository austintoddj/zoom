let mix = require('laravel-mix');

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

// Public Assets...
mix.sass('resources/assets/public/scss/public.scss', 'public/css');

// Admin Assets...
mix.js('resources/assets/admin/js/admin.js', 'public/js')
    .sass('resources/assets/admin/scss/admin.scss', 'public/css')
    .copy('resources/assets/admin/img', 'public/img');