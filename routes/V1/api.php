<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;

Route::prefix('v1')->group(function () {
   Route::controller(PostController::class)->group(function () {
       Route::prefix('posts')
           ->name('api.v1.posts.')
           ->group(function () {
          Route::get('/', 'index')->name('index');;
          Route::get('/{id}', 'show')->where('id', '[0-9]+')->name('show');;
          Route::get('/name/{name}', 'name')->name('name');;
          Route::get('/{post:slug}', 'showBySlug')->name('showBySlug');;
       });
   });
});
