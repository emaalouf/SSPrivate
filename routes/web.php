<?php
use App\Http\Controllers\Backend\Admin\IndexController;
use App\Http\Controllers\Backend\Admin\TrackerController;

Route::namespace('Frontend\Client')->group(function() {
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});

// No Auth Need
Route::namespace('Frontend')->group(function() {
    Route::get('/', 'PageController@index');
});

Route::get('/history', [IndexController::class, 'history'])->name('history');

Route::get('/track', [TrackerController::class, 'index'])->name('index');
Route::post('/admin/send-notification', [TrackerController::class, 'sendNotification'])->name('admin.sendNotification');

