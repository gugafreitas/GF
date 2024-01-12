<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rota para formulário de login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para login
Route::post('login', [LoginController::class, 'login']);

// Rota para logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/messages', 'App\Http\Controllers\MessageController@store')->name('messages.store');
Route::delete('/messages/{message}', 'App\Http\Controllers\MessageController@destroy')->name('messages.destroy');
Route::post('/messages/{message}/move-up', 'App\Http\Controllers\MessageController@moveUp')->name('messages.move-up');
Route::post('/messages/{message}/move-down', 'App\Http\Controllers\MessageController@moveDown')->name('messages.move-down');
