<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\SeguridadController;

Route::get('/', [VistasController::class, 'index'])->name('home_page');

Route::get('/login', [SeguridadController::class, 'login'])->name('login');

Route::get('/logout', [SeguridadController::class, 'logout'])->name('logout');
