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

    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('settings', [AdminController::class, 'save_settings']);

    Route::get('/delete_logo_site', [AdminController::class, 'del_site_logo']);

    Route::resource('room', RoomController::class);
    Route::get('/deleImg/{id?}', [RoomController::class, 'delete_img'])->name('delete_img');

    Route::resource('gallery',    GalleryController::class);
    Route::resource('service',    ServiceController::class);
    Route::resource('blog',       BlogController::class);

    Route::get('contact', [AdminController::class, 'contact'])->name('contact');
    Route::get('show_contact/{id}', [AdminController::class, 'show_contact'])->name('show_contact');
    Route::get('reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::delete('delete_contact/{id}', [AdminController::class, 'delete_contact'])->name('delete_contact');
    Route::delete('delete_reservation/{id}', [AdminController::class, 'delete_reservation'])->name('delete_reservation');

    Route::put('update_status/{id}', [AdminController::class, 'update_status'])->name('update_status');




});
