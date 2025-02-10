<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function() {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile', [AdminController::class, 'profile_data'])->name('profile_data');
    Route::post('check-password', [AdminController::class, 'check_password'])
    ->name('check_password');

    Route::resource('room', RoomController::class);
    Route::get('/deleImg/{id?}', [RoomController::class, 'delete_img'])->name('delete_img');

    Route::resource('gallery',  GalleryController::class);
    Route::resource('service',  ServiceController::class);
    Route::resource('blog',     BlogController::class);



});
