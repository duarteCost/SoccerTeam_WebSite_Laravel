
<?php
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
Route::get('/', 'HomeController@home');
Route::get('/about', 'HomeController@about');

Route::post('/products/add/{produt}', 'ProdutsController@addBasketTemp'); // tive de alterar esta rota duarte
//Route::get('/help', 'HomeController@help');
Route::get('/user', 'UserController@processState');
Route::post('/user/addProduct/{user}', 'ProdutsController@addProduct' );
Route::post('/user/addNew/{new}', 'NewsController@editeNew' );
Route::post('/user/addNew', 'NewsController@addNew' );
Route::post('/user/newState/', 'NewsController@checkNewState' );
Route::post('/user/delete_editProduct', 'ProdutsController@delete_editProducts' );
Route::post('/user/basketOperation', 'ProdutsController@basketOperation' );
Route::post('/user/deleteSocio','UserController@deleteSocio');
Route::post('/user/addGame','GameController@addGame');
Route::post('user/removeGame','GameController@removeGame');
//Route::post('/help/addTicket','TicketsController@addTicket');
Route::post('/tickets/{game}/addBasket','TicketsController@addTicket');
//Route::post('/user','UserController@processState');



Route::get('/news/{user}', 'NewsController@news');
/*Route::get('/user', function(){

      $id = Auth::id();
      return view('user', compact('id'));
});*/



////// JORGE //////////////

Route::get('/detailsNews/{new_id}', 'NewsController@getNew');

Route::get('App/Services/MetricsService', 'NewsController@action');
Route::get('foo', ['as'=>'name', 'uses'=>'MyController@action']);
Route::get('/products/{product_id}', 'ProdutsController@getProducts');
Route::get('/news', 'NewsController@getNews');
Route::get('/detailsProduct/{product_id}', 'ProdutsController@getProducts');


Route::get('/tickets/{game_id}', 'TicketsController@getGames');

//////Ricardo - ajuda-form page/////
Route::get('/help', 'HelpController@getContact');
Route::post('/help', 'HelpController@postContact');
Route::get('/contact', 'HelpController@contact');
/*Route::get('help',
    ['as' => 'help', 'uses' => 'HelpController@create']);//mudei contact=>help
Route::post('help',
    ['as' => 'help', 'uses' => 'HelpController@store']);*/

