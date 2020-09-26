<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'index']);//redireciona para o home

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rota responsavel por criar o post
Route::resource('/posts', PostController::class)->middleware('auth');

