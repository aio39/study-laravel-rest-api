<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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


Route::get('/test', function () {
    return view('test.test');  // == test/index 하고 같음.
});

Route::get('/test2', function () {
    return 'hello';
});

Route::get('/test3', function () {
    $name = '홍깅동';
    $age = 20;
    // NOTE 비즈니스 로직에서 처리한 값을 view에 array로 전달하기
    // return view('test.test2', ['name'=>$name, 'age'=>10]);  // == test/index 하고 같음.
    return view('test.test2', compact('name', 'age')); 
});

Route::get('/test4', [TestController::class, 'index']);

