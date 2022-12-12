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
/* .sass('resources/sass/app.scss', 'public/css')*/

mix.js([ 
    /*'public/assets/js/theme.js',
    'public/assets/js/plugins.js',*/
    
    'public/js/jquery-3.6.1.min.js',
    /*'public/js/bootstrap.bundle-5.2.3.min.js',*/
    'public/js/fancybox.umd.js',
    'public/js/toastr.min.js',
    'public/js/validatorjs.min.js',
    'public/js/favicon_notification.js',
    'public/js/main.js',

    

], 'public/js/all-mixed.js')
.styles([
    'public/assets/css/plugins.css',
    'public/assets/css/style.css',
    /*'public/css/bootstrap-5.2.3.min.css',*/
    'public/css/cust-fonts.css',
    'public/css/fontawsome.min.css',
    'public/css/responsive-fonts.css',
    'public/css/main-basic.css',
    'public/css/toastr.min.css',
    'public/css/fancybox.css',
    
    

],'public/css/all-mixed.css').version();