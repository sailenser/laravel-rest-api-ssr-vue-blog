<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoryPostsController;

Route::get('/', function () {
    return response()->json([
        'message' => 'Добро пожаловать в API!',
        'status' => 'success',
        'data' => [
            'version' => '1.0',
            'author' => 'max'
        ]
    ]);
});

Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [PostsController::class, 'one'])->name('one-post');
Route::post('/posts', [PostsController::class, 'createPost'])->name('posts-create');
Route::put('/posts/{id}', [PostsController::class, 'updatePost'])->name('update-post');
Route::delete('/posts/{id}', [PostsController::class, 'deletePost'])->name('delete-post');
Route::get('/comments/post/{id}', [CommentsController::class, 'commentsPost'])->name('comments');
Route::get('/category', [CategoryPostsController::class, 'index'])->name('category');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/check', [AuthController::class, 'check'])->middleware('auth:api')->name('check');
});
