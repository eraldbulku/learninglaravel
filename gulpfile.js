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

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.styles([
    	'vendor/normalize.css',
    	'app.css'
    ], 'public/output/final.css', 'public/css');

    mix.scripts([
    	'vendor/jquery.js',
    	'main.js',
    	'coupon.js'
    ], 'public/output/scripts.js', 'public/js');

    //mix.version('public/css/all.css');
	
	//mix.phpUnit();

});
