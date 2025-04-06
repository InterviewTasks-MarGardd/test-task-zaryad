<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{category_slug}', [PostController::class, 'index'])
    ->name('posts.category');

Route::get('/posts/{category_slug}/{post_slug}', [PostController::class, 'show'])
    ->name('posts.show');
