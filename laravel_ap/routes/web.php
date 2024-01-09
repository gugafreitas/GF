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

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Rota para mostrar o formulário de login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para realizar o login
Route::post('login', [LoginController::class, 'login']);

// Rota para realizar o logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
