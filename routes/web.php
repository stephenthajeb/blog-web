<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::post('/blogs', [BlogController::class, 'store']);
// Info: if the route contain route param, need to give it a new route name.
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name(
    'blogs.destroy'
);

Route::get('/blogs/{blog}/show', [BlogController::class, 'show'])->name(
    'blogs.show'
);

Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name(
    'blogs.edit'
);

Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name(
    'blogs.update'
);
