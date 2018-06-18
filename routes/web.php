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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::post('/message/sending', 'ContactController@store')->name('message.contact');
Route::post('/subscriber/create', 'ContactController@subscribe')->name('subscribers');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');