<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// Login
Route::post('login', 'App\Http\Controllers\Api\Login@index');
Route::post('login/check', 'App\Http\Controllers\Api\Login@check');
Route::get('login/lupa', 'App\Http\Controllers\Api\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Api\Login@logout');
// Keuangan
Route::get('keuangan', 'App\Http\Controllers\Api\Keuangan@index');
// Pemasukan
Route::get('pemasukan', 'App\Http\Controllers\Api\Pemasukan@index');
Route::get('pemasukan/{id}', 'App\Http\Controllers\Api\Pemasukan@show');
Route::post('pemasukan', 'App\Http\Controllers\Api\Pemasukan@tambah');
Route::put('pemasukan/{id}', 'App\Http\Controllers\Api\Pemasukan@proses_edit');
Route::delete('pemasukan/{id}', 'App\Http\Controllers\Api\Pemasukan@delete');
// Pengeluaran
Route::get('pengeluaran', 'App\Http\Controllers\Api\Pengaluaran@index');
Route::get('pengeluaran/{id}', 'App\Http\Controllers\engaluaransukan@show');
Route::post('pengeluaran', 'App\Http\Controllers\Api\Pengaluaran@tambah');
Route::put('pengeluaran/{id}', 'App\Http\Controllers\engaluaransukan@proses_edit');
Route::delete('pengeluaran/{id}', 'App\Http\Controllers\engaluaransukan@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
