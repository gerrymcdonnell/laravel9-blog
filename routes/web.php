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


//->middleware('auth'); will make user be authed

//show create form
Route::get('/listings/create', [ListingController::class, 'create'] )->middleware('auth');


Route::post('/listings', [ListingController::class, 'store'] )->middleware('auth');

//single listing
Route::get('/listings/{listing}',[ListingController::class, 'show'] );

//edit
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'] )->middleware('auth');;

//update
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');;

//delete
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'] )->middleware('auth');;


//users
//show register
Route::get('/register',[UserController::class, 'create'] );

Route::post('/users',[UserController::class, 'store'] );

//logout
Route::post('/logout',[UserController::class, 'logout'] )->middleware('auth');

Route::get('/login',[UserController::class, 'login'] )->name('login');

Route::post('/users/authenticate',[UserController::class, 'authenticate'] );





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
