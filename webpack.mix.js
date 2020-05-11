const mix = require('laravel-mix');
require('laravel-mix-blade-reload');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
        proxy: 'larafood.amago'
    })
    .bladeReload()

    .copy('node_modules/inputmask/dist/inputmask.min.js', 'public/js')
    .copy('node_modules/inputmask/dist/jquery.inputmask.min.js', 'public/js');
