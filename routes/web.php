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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('states', 'StatesController');

    Route::get('/clients/search', 'ClientsController@searchClients')->name('clients.searchClients');
    Route::resource('clients', 'ClientsController');

    Route::resource('users', 'UserController');

    Route::resource('comments', 'CommentController');

    Route::get('/tickets/search','TicketsController@searchTickets')->name('tickets.searchTickets');
    Route::resource('tickets', 'TicketsController');
});