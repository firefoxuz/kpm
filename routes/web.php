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

Route::group(['middleware' => 'not_authenticated'], function () {

    Route::get('/login', ['App\Http\Controllers\LoginController', 'showPage'])->name('login');
    Route::post('/login', ['App\Http\Controllers\LoginController', 'authenticate'])->name('login');
    Route::get('/register', ['App\Http\Controllers\RegisterController', 'create'])->name('register.create');
    Route::post('/register', ['App\Http\Controllers\RegisterController', 'store'])->name('register.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['App\Http\Controllers\ContactController', 'index'])->name('home');
    Route::get('/add-to-favourite/{contact}', ['App\Http\Controllers\ContactController', 'addToFavourite'])->name('add_to_favourite');
    Route::post('/logout', ['App\Http\Controllers\LogoutController', 'logout'])->name('logout');
});
