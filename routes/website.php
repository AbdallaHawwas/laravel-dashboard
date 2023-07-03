<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', App\Http\Controllers\Website\HomeController::class)->name('index');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auth routes for your application. These
| routes are helpful when building the login and registration screens
| for your application.
|
*/

Route::middleware('website.guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('/register', [\App\Http\Controllers\Website\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Website\Auth\RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('forgot-password', [\App\Http\Controllers\Website\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\Website\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [\App\Http\Controllers\Website\Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [\App\Http\Controllers\Website\Auth\NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('website.auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
