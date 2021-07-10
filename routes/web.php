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
Route::get('/my_ticket', [cinemaController::class,'my_ticket'])->middleware('auth')->name('my_ticket');
Route::get('/create', [cinemaController::class,'create'])->middleware('auth')->name('create');
Route::post('/store', [cinemaController::class,'store'])->middleware('auth')->name('store');
Route::post('/get_ticket', [cinemaController::class,'get_ticket'])->name('get_ticket');

Route::get('/dashboard',[cinemaController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/check_cinema', [cinemaController::class,'check_cinema'])->name('check_cinema');

Route::get('/test', function(){
    return view('test');
});