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

// Frontend Assets...
mix.sass('resources/assets/frontend/sass/frontend.scss', 'public/css');

// Backend Assets...
mix.js('resources/assets/backend/js/backend.js', 'public/js')
    .sass('resources/assets/backend/sass/backend.scss', 'public/css')
    .copy('resources/assets/backend/img', 'public/img');