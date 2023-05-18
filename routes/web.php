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

Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('image.optimize');

    Route::resource('language', \App\Http\Controllers\LanguageController::class)->only(['index', 'edit', 'update']);
    Route::resource('language', \App\Http\Controllers\LanguageController::class)->only(['show'])->withoutMiddleware(['auth']);
    Route::get('language/{locale}/sync', [\App\Http\Controllers\SyncLanguageController::class, 'update'])->name('language.sync');

    Route::resource('qr-code', \App\Http\Controllers\QrCodeController::class)->only(['index']);
    Route::resource('memos', \App\Http\Controllers\MemoController::class);

    Route::resource('roles', \App\Http\Controllers\RoleController::class)->except(['show']);
    Route::resource('admins', \App\Http\Controllers\AdminController::class)->except(['show']);
    Route::resource('impersonate', \App\Http\Controllers\ImpersonateController::class)->only(['create', 'store']);
});

require __DIR__ . '/auth.php';
