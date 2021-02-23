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

Route::get('/','BlogController@index' );
Route::get('/add-post/','BlogController@addPost' );
Route::post('/store','BlogController@store' );
Route::get('/post/{post}', 'BlogController@showFull');
Route::get('/edit/{post}', 'BlogController@edit');
Route::get('/delete/{post}', 'BlogController@delete');
Route::patch('/storeupdate/{post}', 'BlogController@storeUpdate');
Route::get('/categories','BlogController@categories' );
Route::post('/addCat','BlogController@addCat' );
Route::get('/byCategory/{category}', 'BlogController@byCategory');
Route::post('/post/{post}/comment','CommentController@addComment' );

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
