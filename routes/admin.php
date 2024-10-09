<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

//Route::prefix('admin')
//
//    ->group(function () {
//    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
//    Route::get('/posts/{id}', [PostController::class, 'show'])->name('admin.posts.show');
//    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
//    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
//});


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Добавьте другие маршруты для CRUD операций, например:
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
