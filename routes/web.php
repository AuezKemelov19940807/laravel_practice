<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PhotoController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'redirectAdminIndex'])->middleware('auth');


Route::prefix('admin')
    ->name('admin.posts.')
    ->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::prefix('posts')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create',  'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{post}/edit', 'edit')->name('edit');
                Route::patch('/{post}', 'update')->name('update');
                Route::delete('/{post}', 'destroy')->name('destroy');
            });
    });
});







Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.form');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
});




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('photos', PhotoController::class);

require __DIR__.'/auth.php';
