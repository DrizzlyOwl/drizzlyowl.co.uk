var elixir = require('laravel-elixir');
require('laravel-elixir-js-uglify');
require('laravel-elixir-livereload');

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

elixir(function(mix) {
    mix.sass('style.scss');
});

elixir(function(mix) {
    mix.uglify(
        '**/*.js',
        'public/js',
        'resources/assets/js'
    );
});

elixir(function(mix) {
    mix.livereload(
        'app/**/*',
        'public/**/*',
        'resources/views/**/*'
    );
});