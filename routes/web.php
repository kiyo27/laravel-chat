<?php

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

use App\Events\MessageRecived;
use Illuminate\Support\Facades\Route;
Route::get('/',function() {
    return view('welcome');
});

Route::get('/', function () {
    event(new MessageRecived('some data'));
    return view('welcome');
});

Route::get('/chats', 'ChatsController@index');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

