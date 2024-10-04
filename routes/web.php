<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/greeting', function () {
    return "Hello World";
});


Route::get('/', function () {
    return view('welcome');
});

// Группа маршрутов с префиксом "admin"
Route::prefix('admin')->group(function () {

    Route::get('posts', [PostController::class, 'adminIndex'])->name('posts.index');


});
