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
mix.js('resources/assets/public/js/public.js', 'public/js')
    .sass('resources/assets/public/sass/public.scss', 'public/css')
    .copy('resources/assets/vendor/css/toolkit-minimal.css', 'public/vendor/css')
    .copy('resources/assets/vendor/css/application-minimal.css', 'public/vendor/css')
    .copy('resources/assets/vendor/js/toolkit.js', 'public/vendor/js')
    .copy('resources/assets/vendor/js/application.js', 'public/vendor/js')
    .copy('resources/assets/vendor/fonts', 'public/vendor/fonts')
    .copy('resources/assets/public/img', 'public/img');

// Admin Assets...
mix.js('resources/assets/admin/js/admin.js', 'public/js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/css')
    .copy('resources/assets/admin/img', 'public/img');
