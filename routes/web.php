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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('conversations', 'ConversationController', ['only' => ['index', 'show', 'store', 'destroy']]);
Route::get('users', 'ConversationController@users');
// routes used for chat
// Route::resource('messages', 'MessagesController', ['only' => ['store']]);
// Route::post('storeConversations', 'MessagesController@store')->name('storeConversations');
// Route::get('get-messages/{id}', 'ConversationController@getMessages');

// end of routes

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
