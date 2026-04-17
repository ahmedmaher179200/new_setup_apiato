<?php

use App\Containers\AppSection\Dashboard\UI\WEB\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::localized(function () {
    Route::get('/', HomePageController::class)->name('dashboard.home')->middleware('auth:web');
});
