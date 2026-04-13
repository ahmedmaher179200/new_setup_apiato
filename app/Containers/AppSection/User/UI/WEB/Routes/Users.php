<?php

use App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {
    Route::get('users', [UsersController::class, 'index'])->name('dashboard.users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('dashboard.users.create');
    Route::post('users', [UsersController::class, 'store'])->name('dashboard.users.store');
    Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('users/{id}', [UsersController::class, 'update'])->name('dashboard.users.update');
    Route::get('users/{id}', [UsersController::class, 'destroy'])->name('dashboard.users.destroy');
});
