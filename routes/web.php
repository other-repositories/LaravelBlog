<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index']);


Route::get('/users', [UserController::class, 'index']);
Route::get('/user/add', [UserController::class, 'add']);
Route::get('/user/{user}', [UserController::class, 'view']);
Route::get('/user/{user}/delete', [UserController::class, 'drop']);
Route::get('/user/{user}/edit', [UserController::class, 'edit']);
Route::post('/user/{user}/edit', [UserController::class, 'store']);
Route::post('/user/add', [UserController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/user/{user}/posts', [PostController::class, 'view']);
Route::get('/user/{user}/post/{post}/edit', [PostController::class, 'edit']);
Route::post('/user/{user}/post/{post}/edit', [PostController::class, 'store']);
Route::get('/user/{user}/post/add', [PostController::class, 'add']);
Route::post('/user/{user}/post/add', [PostController::class, 'store']);
Route::get('/user/{user}/post/{post}/delete', [PostController::class, 'drop']);


Route::get('/posts/post/{post}', [CommentController::class, 'index']);
Route::get('/posts/post/{post}/comment/add', [CommentController::class, 'add']);
Route::post('/posts/post/{post}/comment/add', [CommentController::class, 'store']);
Route::get('/posts/post/{post}/comment/{comment}/delete', [CommentController::class, 'drop']);
Route::get('/moderate', [CommentController::class, 'moderation']);
Route::get('/moderate/{comment}/approve', [CommentController::class, 'approved']);
Route::get('/moderate/{comment}/delete', [CommentController::class, 'drop']);