<?php

use App\Http\Controllers\Inertia\WelcomeInertiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeInertiaController::class, 'index'])->name('welcome');
