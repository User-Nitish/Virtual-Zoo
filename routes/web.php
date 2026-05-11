<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/directory', [AnimalController::class, 'directory'])->name('directory');

// Bootstrap Test Route
Route::view('/test', 'test')->name('test');

// Admin Routes (No Auth for College Project simplicity)
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Resource route for all Animal CRUD operations (Admin Table)
    Route::resource('animals', AnimalController::class);
    
    // Resource route for all Category CRUD operations
    Route::resource('categories', CategoryController::class);
});
