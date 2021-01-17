const mix = require('../../laravel-mix');

// // Dashboard stack
mix.js(['Resources/assets/js/page/dashboard.js'], 'public/js/dashboard.js');
mix.sass('Resources/assets/sass/page/dashboard.scss', 'public/css').minify('public/css/dashboard.css');


// const dotenvExpand = require('dotenv-expand');
// dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

// const mix = require('laravel-mix');
// require('laravel-mix-merge-manifest');

// mix.setPublicPath('../../public').mergeManifest();

// mix.js(__dirname + '/Resources/assets/js/app.js', 'js/dashboard.js')
//     .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/dashboard.css');

// if (mix.inProduction()) {
//     mix.version();
// }
