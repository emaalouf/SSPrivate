<?php
use App\Http\Controllers\Backend\Admin\IndexController;

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
