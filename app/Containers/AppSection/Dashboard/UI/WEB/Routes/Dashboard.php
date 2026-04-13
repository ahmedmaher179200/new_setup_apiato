<?php

use App\Containers\AppSection\Dashboard\UI\WEB\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {
    Route::get('/delete-popup', [DashboardController::class, 'DeletePopup'])->name('DeletePopup');
});
