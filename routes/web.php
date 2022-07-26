<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ListingController::class, 'index'] );



//show create form
Route::get('/listings/create', [ListingController::class, 'create'] );


Route::post('/listings', [ListingController::class, 'store'] );

//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show'] );

//edit
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'] );

//update
Route::put('/listings/{listing}',[ListingController::class, 'update'] );

//delete
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'] );


//users
//show register
Route::get('/register',[UserController::class, 'create'] );








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
