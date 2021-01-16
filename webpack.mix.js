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

// Page and subpage stack
mix.js(['resources/js/page/homepage-stack.js'], 'public/js/homepage-stack.js');
mix.js(['resources/js/page/subpage-stack.js'], 'public/js/subpage-stack.js');

mix.sass('resources/sass/page/homepage-stack.scss', 'public/css').minify('public/css/homepage-stack.css');
mix.sass('resources/sass/page/subpage-stack.scss', 'public/css').minify('public/css/subpage-stack.css');

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();
