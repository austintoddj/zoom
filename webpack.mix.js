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

// Public Assets...
mix.sass('resources/public/scss/public.scss', 'public/css');

// Auth Assets...
mix.js('resources/auth/js/auth.js', 'public/js')
    .sass('resources/auth/scss/auth.scss', 'public/css');

// Admin Assets...
mix.js('resources/admin/js/admin.js', 'public/js')
    .sass('resources/admin/scss/admin.scss', 'public/css')
    .copy('resources/admin/img', 'public/img');

