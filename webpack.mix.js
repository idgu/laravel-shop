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

mix.js('resources/assets/js/app.js', 'public/js')
    .styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/base.css',
        'resources/assets/css/bootstrap-responsive.min.css',
        'resources/assets/css/font-awesome.css',
        'resources/assets/css/font-awesome-ie7.css',
        'resources/assets/js/google-code-prettify/prettify.css'
    ], 'public/css/libs.css')
    .styles([
        'resources/assets/css/admin/bootstrap/bootstrap.min.css',
        'resources/assets/css/admin/font-awesome/css/font-awesome.css',
        'resources/assets/css/admin/dataTables.bootstrap4.css',
        'resources/assets/css/admin/sb-admin.css',
    ], 'public/css/adminlibs.css')

    .scripts([
        'resources/assets/js/jquery.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/google-code-prettify/prettify.js',
        'resources/assets/js/bootshop.js',
        'resources/assets/js/jquery.lightbox-0.5.js'
    ], 'public/js/libs.js')

    .scripts([
        'resources/assets/js/admin/jquery/jquery.min.js',
        'resources/assets/js/admin/bootstrap/bootstrap.bundle.min.js',
        'resources/assets/js/admin/jquery-easing/jquery.easing.min.js',
        'resources/assets/js/admin/chartjs/Chart.min.js',
        'resources/assets/js/admin/datatables/jquery.dataTables.js',
        'resources/assets/js/admin/datatables/dataTables.bootstrap4.js',
        'resources/assets/js/admin/sb-admin.min.js',
    ], 'public/js/adminlibs.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
