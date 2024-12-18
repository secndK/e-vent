<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

// Routes pour les équipements
Route::resource('equipements', EquipementController::class);

// Routes pour les utilisateurs
Route::resource('users', UserController::class);

// Routes pour les rôles
Route::resource('roles', RoleController::class);

// Routes pour les permissions
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');