<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Modern Zoo Consolidated Routes
Route::get('/directory', [AnimalController::class, 'directory'])->name('directory');
Route::get('/modern-directory', [AnimalController::class, 'directory'])->name('modern.directory');
Route::view('/tour', 'tour')->name('tour');
Route::view('/modern-webcams', 'zoo.webcams')->name('modern.webcams');

// Bootstrap Test Route
Route::view('/test', 'test')->name('test');

// Admin Routes (No Auth for College Project simplicity)
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Resource route for all Animal CRUD operations (Admin Table)
    Route::resource('animals', AnimalController::class);
    
    // Resource route for all Category CRUD operations
    Route::resource('categories', CategoryController::class);

    // Welfare Tracking Routes
    Route::get('/welfare', [\App\Http\Controllers\WelfareController::class, 'index'])->name('admin.welfare');
    Route::patch('/welfare/{animal}', [\App\Http\Controllers\WelfareController::class, 'update'])->name('admin.welfare.update');
});
