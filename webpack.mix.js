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

mix.version();

// Page and subpage stack
mix.js(['resources/js/page/homepage-stack.js'], 'public/js/homepage-stack.js');
mix.js(['resources/js/page/subpage-stack.js'], 'public/js/subpage-stack.js');

mix.sass('resources/sass/page/homepage-stack.scss', 'public/css').minify('public/css/homepage-stack.css');
mix.sass('resources/sass/page/subpage-stack.scss', 'public/css').minify('public/css/subpage-stack.css');

// Dashboard
mix.sass('resources/sass/dashboard/dashboard.scss', 'public/css').minify('public/css/dashboard.min.css');
mix.js(['resources/js/dashboard/dashboard.js'], 'public/js/dashboard.js');
mix.js(['resources/js/dashboard/tinymce-editor.js'], 'public/js/tinymce-editor.js');

mix.copyDirectory('node_modules/tinymce/icons', 'public/js/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/js/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/js/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/js/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/js/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/js/tinymce.min.js');