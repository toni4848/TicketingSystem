<?php

use App\State;
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


Route::get('/about', function () {
    return view('about');
});

//States Routes

Route::get('/states', 'StatesController@index');

Route::post('/states', 'StatesController@store');

Route::get('/states/create','StatesController@create');

Route::get('/states/{state}','StatesController@show');

Route::get('/states/{state}/edit','StatesController@edit');

Route::put('/states/{state}', 'StatesController@update');

Route::delete('/states/{state}', 'StatesController@destroy');

//Route::resource('states', 'StatesController');

//Clients Routes

Route::get('/clients', 'ClientsController@index');

Route::post('/clients', 'ClientsController@store');

Route::get('/clients/create','ClientsController@create');

Route::get('/clients/{client}','ClientsController@show');

Route::get('/clients/{client}/edit','ClientsController@edit');

Route::put('/clients/{client}', 'ClientsController@update');

Route::delete('/clients/{client}', 'ClientsController@destroy');

//Users routes

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update')->name('users.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

//Comments routes

Route::get('/comments', 'CommentController@index')->name('comments.index');
Route::get('/comments/create', 'CommentController@create')->name('comments.create');
Route::post('/comments', 'CommentController@store')->name('comments.store');
Route::get('/comments/{comment}', 'CommentController@show')->name('comments.show');
Route::get('/comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
Route::put('/comments/{comment}', 'CommentController@update')->name('comments.update');
Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');