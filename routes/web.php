<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/post', [PostsController::class, 'show']);
Route::get('/post/create', [PostsController::class, 'create']);
Route::get('/post/edit', [PostsController::class, 'edit']);
Route::get('/post/{post}', [PostsController::class, 'index']);

Route::post('/post', [PostsController::class, 'store']);
Route::put('/post/{post}', [PostsController::class, 'update']);
Route::delete('/post/{post}', [PostsController::class, 'destroy']);

