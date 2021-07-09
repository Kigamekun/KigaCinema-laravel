<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [apiController::class,'api'])->name('api');
Route::get('/get_cinema', [apiController::class, 'get_cinema'])->name('get_cinema');
Route::get('/get_detail_cinema/{id}', [apiController::class, 'get_detail_cinema'])->name('get_detail_cinema');
