const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'font_awesome': 'public/assets/font-awesome-4.6.3/less/',
    'animate': 'node_modules/animate.css/animate.css',
    'noty': 'node_modules/noty/js/noty/packaged/',
    'noty_func': 'public/js/noty/',
    'css': 'resources/assets/css',
    'js': 'resources/assets/js',
    'assets': 'resources/assets/',
    'less': 'resources/assets/less/'
};

//elixir(mix => {
//    mix.sass('app.scss')
//       .webpack('app.js');
//});

elixir(function (mix) {

    mix//.copy(paths.font_awesome, paths.less)
        //.copy(paths.animate, paths.css)
        //.copy(paths.noty + 'jquery.noty.packaged.js', 'resources/assets/js')
        //.copy(paths.noty_func + 'noty.js', 'resources/assets/js')
    ;

    mix.less('font-awesome.less')
        .styles(['vertical-rhythm.min.css', 'style.css', 'animate.css'])
        .scripts(["jquery.noty.packaged.js", "noty.js"]);
});