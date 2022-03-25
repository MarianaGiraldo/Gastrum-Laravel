<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\UserController;

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
    return view('index',['bg'=>'bg1.jpg']);
});

Route::get('/home', function () {
    return view('index',['bg'=>'bg1.jpg']);
});

Auth::routes();


Route::resource('/users', UserController::class);
Route::resource('/payrolls', PayrollController::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
