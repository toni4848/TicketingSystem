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

Route::get('/states', 'StatesController@index')->name('states.index');

Route::post('/states', 'StatesController@store')->name('states.store');

Route::get('/states/create','StatesController@create')->name('states.create');

Route::get('/states/{state}','StatesController@show')->name('states.show');

Route::get('/states/{state}/edit','StatesController@edit')->name('states.edit');

Route::put('/states/{state}', 'StatesController@update')->name('states.update');

Route::delete('/states/{state}', 'StatesController@destroy')->name('states.destroy');

//Route::resource('states', 'StatesController');

//Clients Routes

Route::get('/clients', 'ClientsController@index')->name('clients.index');

Route::post('/clients', 'ClientsController@store')->name('clients.store');

Route::get('/clients/create','ClientsController@create')->name('clients.create');

Route::get('/clients/{client}','ClientsController@show')->name('clients.show');

Route::get('/clients/{client}/edit','ClientsController@edit')->name('clients.edit');

Route::put('/clients/{client}', 'ClientsController@update')->name('clients.update');

Route::delete('/clients/{client}', 'ClientsController@destroy')->name('clients.destroy');

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

Route::get('/tickets','TicketsController@index')->name('tickets.index');

Route::post('/tickets','TicketsController@store')->name('tickets.store');

Route::get('/tickets/create', 'TicketsController@create')->name('tickets.create');

Route::get('/tickets/{ticket}','TicketsController@show')->name('tickets.show');

Route::get('/userTickets', 'TicketsController@userTickets')->name('tickets.userTickets');

Route::get('/tickets/{ticket}/edit','TicketsController@edit')->name('tickets.edit');

Route::put('/tickets/{ticket}','TicketsController@update')->name('tickets.update');

Route::delete('/tickets/{ticket}','TicketsController@destroy')->name('tickets.destroy');
