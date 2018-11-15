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
   .sass('resources/sass/app.scss', 'public/css')

    // Hyper theme scss
    .sass('resources/hyper/src/scss/app.scss', 'public/css')
    .sass('resources/hyper/src/scss/icons.scss', 'public/css')

    // Hyper theme js
    // mix.js('resources/hyper/dist/assets/js/app.min.js', 'public/js')
    // mix.js('resources/hyper/src/js/hyper.js', 'public/js')
    //
    // mix.js('resources/hyper/dist/assets/js/vendor/Chart.bundle.min.js', 'public/js')
    // mix.js('resources/hyper/dist/assets/js/vendor/jquery-jvectormap-1.2.2.min.js', 'public/js')
    // mix.js('resources/hyper/dist/assets/js/vendor/jquery-jvectormap-world-mill-en.js', 'public/js')
    //
    // mix.js('resources/hyper/dist/assets/js/pages/demo.dashboard.js', 'public/js')

    // Hyper images
    mix.copyDirectory('resources/hyper/dist/assets', 'public/hyper');


