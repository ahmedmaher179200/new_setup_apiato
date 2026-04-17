<?php

use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\IndexUserController;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\CreateUserController;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\StoreUserController;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\EditUserController;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\UpdateUserController;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\DestroyUserController;
use Illuminate\Support\Facades\Route;

Route::localized(function () {
    Route::middleware(['auth:web'])->group(function () {
        Route::get('users', IndexUserController::class)->name('dashboard.users.index');
        Route::get('users/create', CreateUserController::class)->name('dashboard.users.create');
        Route::post('users', StoreUserController::class)->name('dashboard.users.store');
        Route::get('users/{id}/edit', EditUserController::class)->name('dashboard.users.edit');
        Route::put('users/{id}', UpdateUserController::class)->name('dashboard.users.update');
        Route::get('users/{id}', DestroyUserController::class)->name('dashboard.users.destroy');
    });
});
