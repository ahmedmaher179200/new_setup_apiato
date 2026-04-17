<?php

use App\Containers\AppSection\Dashboard\UI\WEB\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', HomePageController::class)->name('dashboard.home')->middleware('auth:web');
    }
);
