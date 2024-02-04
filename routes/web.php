<?php

use App\Http\Controllers\Inertia\HomeInertiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeInertiaController::class, 'index'])->name('home');
