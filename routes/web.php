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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/post/create', [PostsController::class, 'create'])->name(('posts.create'));
Route::get('/post/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
Route::get('/post/index', [PostsController::class, 'index'])->name('posts.index');
Route::get('/post/{id}', [PostsController::class, 'show'])->name('posts.show');

// ->middleware(['auth']) , 생성자에서 적용
Route::put('/post/{id}', [PostsController::class, 'update'])->name('posts.update');
Route::post('/post', [PostsController::class, 'store'])->name('posts.store');
Route::delete('/post/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

require __DIR__.'/auth.php';
