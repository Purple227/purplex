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

mix.js('resources/js/app-backend.js', 'public/js')
   .js('resources/js/app-frontend.js', 'public/js')

   .sass('resources/sass/frontend/bulma.scss', 'public/css/frontend')
   .sass('resources/sass/frontend/fontawesome.scss', 'public/css/frontend')


   .sass('resources/sass/backend/bulma.scss', 'public/css/backend')
   .sass('resources/sass/backend/fontawesome.scss', 'public/css/backend')
   
   
   .sass('resources/sass/animate.scss', 'public/css')

   //.copyDirectory('node_modules/tinymce/skins', 'public/css/tinymce/skin');

   //.copy('node_modules/vue-social-sharing/dist/vue-social-sharing.js', 'public/js/vue-social-sharing.js');
