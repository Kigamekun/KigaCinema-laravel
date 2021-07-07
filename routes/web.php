<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\cinemaController;

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

Route::get('/', [cinemaController::class,'index']);
Route::get('/order/{mov_id}', [cinemaController::class,'order'])->middleware('auth')->name('order');
Route::get('/create', [cinemaController::class,'create'])->middleware('auth')->name('create');
Route::post('/store', [cinemaController::class,'store'])->middleware('auth')->name('store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/check_cinema', [cinemaController::class,'check_cinema'])->name('check_cinema');

Route::get('/test', function(){
    return view('test');
});