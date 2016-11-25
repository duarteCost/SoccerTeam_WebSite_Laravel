
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


Route::get('/notes/','NotesController@show');
Route::post('/notes/','NotesController@add');

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/news', 'HomeController@news');
Route::get('/produts', 'ProdutsController@produts');
Route::get('/help', 'HomeController@help');
Route::get('/user', 'UserController@checkUser');
Route::post('/user/addProduct/{user}', 'ProdutsController@addProduct' );
Route::post('/user/deleteProduct', 'ProdutsController@deleteProducts' );
Route::post('/user/deleteSocio','UserController@deleteSocio');
/*Route::get('/user', function(){

      $id = Auth::id();
      return view('user', compact('id'));
});*/