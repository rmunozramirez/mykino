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
Route::group(['middleware' => ['web']], function (){
    
    Route::get('/actors/{id}', ['as' =>'actors.show', 'uses' => 'ActorController@show']);
    Route::get('/statistics', ['as' =>'statistics.all', 'uses' => 'StatisticsController@index']);
    Route::get('/time', ['as' =>'statistics.time', 'uses' => 'StatisticsController@getTime']);
    Route::post('/time/{month_year}', ['as' =>'statistics.month_year', 'uses' => 'StatisticsController@month_year']);
    Route::get('/month', ['as' =>'statistics.month', 'uses' => 'StatisticsController@show']);
    Route::get('/year/{year}', ['as' =>'year.show', 'uses' => 'YearController@show']);
    Route::get('/ages/{slug}', ['as' =>'ages.show', 'uses' => 'AgeController@show']);
    Route::get('/language/{slug}', ['as' =>'languages.show', 'uses' => 'LanguageController@show']);
    Route::get('/category/{slug}', ['as' =>'categories.show', 'uses' => 'CategoryController@show']);
    Route::get('/list', ['as' =>'films.all', 'uses' => 'ListController@index']); 
    Route::get('/films/create', ['as' =>'films.create', 'uses' => 'FilmController@create']); 
    Route::post('/films/store', ['as' =>'films.store', 'uses' => 'FilmController@store']); 
    Route::get('/films/{slug}/update', ['as' =>'films.update', 'uses' => 'FilmController@update'])->where('slug', '[\w\d\-\_]+'); 
    Route::get('/films/{slug}/delete', ['as' =>'films.destroy', 'uses' => 'FilmController@destroy'])->where('slug', '[\w\d\-\_]+'); 
    Route::get('/films/{slug}/edit', ['as' =>'films.edit', 'uses' => 'FilmController@edit'])->where('slug', '[\w\d\-\_]+'); 
    Route::get('/films/{slug}', ['as' =>'films.show', 'uses' => 'FilmController@show'])->where('slug', '[\w\d\-\_]+'); 
    Route::resource('category', 'CategoryController');

    Route::get('/', 'FilmController@index'); 

});

//Route::get('/', function () {
//    return view('welcome');
//});
