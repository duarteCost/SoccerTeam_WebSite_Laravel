
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
Route::get('/help', 'HomeController@help');
Route::get('/user', 'UserController@processState');
Route::post('/user/addProduct/{user}', 'ProdutsController@addProduct' );
Route::post('/user/addNew/{new}', 'NewsController@editeNew' );
Route::post('/user/addNew', 'NewsController@addNew' );
Route::post('/user/newState/', 'NewsController@checkNewState' );
Route::post('/user/delete_editProduct', 'ProdutsController@delete_editProducts' );
Route::post('/user/basketOperation', 'ProdutsController@basketOperation' );
Route::post('/user/deleteSocio','UserController@deleteSocio');
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



Route::get('testa', function() {
    $s3 = \Storage::disk('s3');
    $client = $s3->getDriver()->getAdapter()->getClient();
    $expiry = "+10 minutes";

    $command = $client->getCommand('GetObject', [
        'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
        'Key'    => "10000.png/in/s3/bucket"
    ]);

    $request = $client->createPresignedRequest($command, $expiry);

    echo "<img src=$request>";
    return (string) $request->getUri();
});

    Route::get('test', function(){
    echo 123;

    $s3 = Storage::disk('s3');
    $s3->putFileAs('photos', new File('/photos'), '10006.png');
    //Storage::disk('s3')->put('myfileteste.txt', $fileContents);
    //$contents = Storage::get('clube.jpeg');
    // $exists = $s3->exists('clube.jpeg'); // Se existe retorna 1
    // $contents = $s3->get('clube.jpeg');
    //Storage::disk('s3')->put('myfileteste.txt', file_get_contents($file));
    //$contentsText = $s3->get('photo.png');
    //$exists = $s3->exists('clube.png');
    //echo "dfew $exists dsfcrw";
    //echo $contentsText;
    //  echo "<img src="+htmlspecialchars($contents)+"alt='test' />";
});

Route::get('imagess', function(){
    echo 123;
    $s3 = Storage::disk('s3');
    $path = "10000.png"; //'uploads/resized/' . $image;
    echo "--$path--";
    $exists = $s3->exists($path);
    echo "++++$exists++++";
    if ($exists) {
        //$file = $s3->file_get_contents($path);
        $file = $s3->get($path);
        $urlFile = $s3->url($path);
        //dd($file);

        //$image = Image::make($file);
        //echo "<img src=$image>";
        //return ($urlFile);
        // return $urlFile;
        //Response::download($path);
        return Image::make($file)->response();
    }
});


Route::get('images/{image}', function($image = null) {
    $s3 = Storage::disk('s3');
    $path = $image; //'uploads/resized/' . $image;
    echo "--$path--";
    $exists = $s3->exists($path);
    echo "++++$exists++++";
    if ($exists) {
        //$file = $s3->file_get_contents($path);
        //$file = $s3->get($path);
        $urlFile = $s3->url($path);
        //dd($file);
        echo "<img src=$urlFile>";
        //return Image::make($file)->response();
        // return $urlFile;
        //Response::download($path);
        return (string) $urlFile;
       // return Image::make($file)->response();
    }

});
/*
Route::get('images/{image}', function($image = null) {
    $s3 = Storage::disk('s3');
    $path = $image; //'uploads/resized/' . $image;
    $exists = $s3->exists($path);
    echo "++++$exists++++";
    if ($exists) {

        Storage::disk('s3')->get('$path');

        echo '<img src="{{ Storage::path($path) }}" />';

    }

});*/
