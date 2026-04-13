<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// date_default_timezone_set(Setting::first()->time_zone);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/', HomePageController::class)->name('dashboard.home')->middleware('auth:web');
});
