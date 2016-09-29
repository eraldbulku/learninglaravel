<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('contact', 'WelcomeController@contact');

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

/*Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/{id/edit}', 'ArticlesController@edit');*/

Route::resource('articles', 'ArticlesController');

Route::get('foo', ['middleware'=>'manager', function() {
	return 'this page may only be viewed by managers';
}]);
