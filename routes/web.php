<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/{any}', [DashboardController::class, 'index'])->name('*');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');