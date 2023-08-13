<?php

use App\Http\Controllers\Manager\DocumentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('user.home');
// })->name('home');
// ->middleware(['auth', 'verified']);

/* Route::get('/dashboard/documents', function () {
    return view('admin.Dashboard-Document-Management');
})->name('dashboard.documents'); */

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

/* Route::get('/dashboard/users', function () {
    return view('admin.Dashboard-User-Management');
})->name('dashboard.users');

Route::get('/dashboard/statistiques', function () {
    return view('admin.Dashboard-Statistiques');
})->name('dashboard.statistiques'); */

// Route::get('/demande-de-pret', function () {
//     return view('user.DemandePrêt');
// })->name('user.demandePret');

// Route::get('/documents', function () {
//     return view('user.DocumentPage');
// })->name('user.documents');

// Route::get('/folder-content', function () {
//     return view('user.FolderContentPage');
// })->name('user.folder-content');

// Route::get('/folder', function () {
//     return view('user.FolderPage');
// })->name('user.folder');
