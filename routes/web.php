<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('listings',[
        'heading'=>'Latest listings',
        'listings'=>Listing::all()
]);
});


//single lsiting
Route::get('/listings/{id}', function ($id) {
    return view('listing',[
        'listing'=>Listing::find($id)
    ]);
});



//examples
Route::get('/test', function () {
    return view('test');
});

Route::get('/test2', function () {
    return 'this is a test test2';
});

Route::get('/test3', function () {
    return response('<h1>hello world</h1>');
});

//only allow number parameters
Route::get('/posts/{id}', function ($id) {
    ddd($id);
    return response('Post '.$id);
})->where('id','[0-9]+');


Route::get('/search', function (Request $request) {
    dd($request->name);
});
