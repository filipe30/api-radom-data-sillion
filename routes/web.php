<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/login', 'App\Http\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user');
});
Auth::routes();
