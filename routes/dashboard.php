<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "dashboard" middleware group. Make something great!
|
*/

Route::middleware('dashboard.auth')->group(function () {
    Route::get('/', \App\Http\Controllers\Dashboard\DashboardController::class)->name('index');

    Route::get('profile', [\App\Http\Controllers\Dashboard\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\Dashboard\ProfileController::class, 'update'])->name('profile.update')->middleware('image.optimize');

    Route::resource('language', \App\Http\Controllers\Dashboard\LanguageController::class)->only(['index', 'edit', 'update']);
    Route::resource('language', \App\Http\Controllers\Dashboard\LanguageController::class)->only(['show'])->withoutMiddleware(['auth']);
    Route::get('language/{locale}/sync', [\App\Http\Controllers\Dashboard\SyncLanguageController::class, 'update'])->name('language.sync');

    Route::resource('qr-code', \App\Http\Controllers\Dashboard\QrCodeController::class)->only(['index']);
    Route::resource('memos', \App\Http\Controllers\Dashboard\MemoController::class);

    Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class)->except(['show']);
    Route::resource('admins', \App\Http\Controllers\Dashboard\AdminController::class)->except(['show']);
    Route::resource('impersonate', \App\Http\Controllers\Dashboard\ImpersonateController::class)->only(['create', 'store']);
});

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

Route::withoutMiddleware(\App\Http\Middleware\Dashboard\RoutePermission::class)->group(function () {
    Route::middleware('dashboard.guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [\App\Http\Controllers\Dashboard\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Dashboard\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('reset-password/{token}', [\App\Http\Controllers\Dashboard\Auth\NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Dashboard\Auth\NewPasswordController::class, 'store'])->name('password.store');
    });

    Route::middleware('dashboard.auth')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
