<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//logout
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('/');
});

Auth::routes();
Auth::routes(['verify'=>'true']);

Route::get('/home', 'HomeController@index')->name('home');

//Route::group([
//    'namespace'=>'Backend',
//    'prefix'=>'admin',
//    'as'    => 'admin.',
//    'middleware'    =>['auth', 'verified']
//    /*'middleware'    =>'admin'*/
//], function (){
////    include_route_files(__DIR__.'/backend/');
//});


Route::group([
    'namespace'=>'Auth',
    //'prefix'=>'admin',
    'as'    => 'auth.',
    //'middleware'    =>['auth', 'verified']
    /*'middleware'    =>'admin'*/
], function (){
    include_route_files(__DIR__.'/auth/');
});
