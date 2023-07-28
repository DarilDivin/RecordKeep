<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('user', UserController::class)->except('show');
    Route::resource('document', DocumentController::class)->except(['show']);
});
