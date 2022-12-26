const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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
    'resources/js/app.js',
    /*'public/js/jquery-3.6.1.min.js',*/
    'public/js/bootstrap.bundle-5.2.3.min.js',
    /*'public/js/fancybox.umd.js',*/
    /*'public/js/toastr.min.js',*/
    'public/js/validatorjs.min.js',
    /*'public/js/favicon_notification.js',*/
    'public/js/main.js',
], 'public/js/all-mixed.js')
.postCss('resources/css/app.css','public/css')
.purgeCss({
    content: [
        "resources/**/*.php",
        "app/**/*.php",
        "public/js/fancybox.mid.js"
    ]
}).version();

















mix.js([ 

    /*'public/js/jquery-3.6.1.min.js',*/
    /*'public/js/favicon_notification.js',*/
    'resources/js/app.js',
    /*'public/js/fancybox.umd.js',*/
    /*'public/js/toastr.min.js',*/
    'public/js/pace-1.2.4.min.js',
    'public/js/bootstrap.bundle.min.js',
    'public/js/select2-4.1.0.min.js',
    'public/js/jquery.fileuploader.min.js',
    'public/js/validatorjs.min.js',
    
    'public/js/main.js',
    
], 'public/js/dashboard-all-mixed.js')
.styles([


    'public/css/bootstrap.rtl.min.css',
    'public/css/pace-theme-default.min.css',
    'public/css/toastr.min.css',
    'public/css/fancybox.css',
    'public/css/cust-fonts.css',
    'public/css/fontawsome.min.css',
    'public/css/responsive-fonts.css',
    'public/css/fileuploader-jquery.css',
    'public/css/main-dashboard.css',
    'public/css/main-basic.css',
    'public/css/flag-icons.min.css',
    'public/css/select2.min.css',
    'public/css/select2-bootstrap-5-theme.rtl.min.css',  

],'public/css/dashboard-all-mixed.css').version();


/*mix.styles(['public/css/app.css','public/css/fancybox.css'],'public/css/all-mixed.css');*/