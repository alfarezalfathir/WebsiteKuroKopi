<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home'); // atau ganti ke 'home' kalau kamu pakai home.blade.php
});

/*
|--------------------------------------------------------------------------
| Profile (Login User)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTE (WAJIB LOGIN + ROLE ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {

        Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/admin/menu', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/admin/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/admin/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/admin/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

    });

});

require __DIR__.'/auth.php';