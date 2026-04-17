<?php

use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\IndexRoleController;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\CreateRoleController;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\StoreRoleController;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\EditRoleController;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\UpdateRoleController;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers\DestroyRoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {
    Route::get('roles', IndexRoleController::class)->name('dashboard.roles.index');
    Route::get('roles/create', CreateRoleController::class)->name('dashboard.roles.create');
    Route::post('roles', StoreRoleController::class)->name('dashboard.roles.store');
    Route::get('roles/{id}/edit', EditRoleController::class)->name('dashboard.roles.edit');
    Route::put('roles/{id}', UpdateRoleController::class)->name('dashboard.roles.update');
    Route::get('roles/{id}', DestroyRoleController::class)->name('dashboard.roles.destroy');
});
