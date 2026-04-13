<?php

use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {
    Route::get('roles', [RolesController::class, 'index'])->name('dashboard.roles.index');
    Route::get('roles/create', [RolesController::class, 'create'])->name('dashboard.roles.create');
    Route::post('roles', [RolesController::class, 'store'])->name('dashboard.roles.store');
    Route::get('roles/{id}/edit', [RolesController::class, 'edit'])->name('dashboard.roles.edit');
    Route::put('roles/{id}', [RolesController::class, 'update'])->name('dashboard.roles.update');
    Route::get('roles/{id}', [RolesController::class, 'destroy'])->name('dashboard.roles.destroy');
});
