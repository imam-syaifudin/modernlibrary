<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class,'index']);
Route::get('/index', [IndexController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('buku',BukuController::class);
route::get('buku/hidden/{buku}',[BukuController::class,'hidden'])->middleware('isadmin');

route::resource('kategori',KategoriController::class)->middleware('isadmin');
