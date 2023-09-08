<?php

use App\Http\Controllers\Admin\AdminRegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\DocumentController;

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
    return view('index');
})->middleware('guest');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

Route::post( '/user-register', [AdminRegisteredUserController::class, 'store'])
            // ->middleware(['auth'])
            ->name('user.register');
