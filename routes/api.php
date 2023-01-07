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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kategori', [App\Http\Controllers\API\ApiKategoriController::class, 'get']);
Route::get('kategori/{id}', [App\Http\Controllers\API\ApiKategoriController::class, 'get']);
Route::post('kategori', [App\Http\Controllers\API\ApiKategoriController::class, 'store']);
Route::put('kategori/{id}', [App\Http\Controllers\API\ApiKategoriController::class, 'update']);
Route::delete('kategori/{id}', [App\Http\Controllers\API\ApiKategoriController::class, 'destroy']);

Route::get('user', [App\Http\Controllers\API\ApiUserController::class, 'get']);
Route::get('user/{id}', [App\Http\Controllers\API\ApiUserController::class, 'get']);
Route::post('user', [App\Http\Controllers\API\ApiUserController::class, 'store']);
Route::put('user/{id}', [App\Http\Controllers\API\ApiUserController::class, 'update']);
Route::delete('user/{id}', [App\Http\Controllers\API\ApiUserController::class, 'destroy']);

Route::get('buku', [App\Http\Controllers\API\ApiBukuController::class, 'get']);
Route::get('buku/{id}', [App\Http\Controllers\API\ApiBukuController::class, 'get']);
Route::post('buku', [App\Http\Controllers\API\ApiBukuController::class, 'store']);
Route::put('buku/{id}', [App\Http\Controllers\API\ApiBukuController::class, 'update']);
Route::delete('buku/{id}', [App\Http\Controllers\API\ApiBukuController::class, 'destroy']);

Route::get('peminjaman', [App\Http\Controllers\API\ApiPeminjamanController::class, 'get']);
Route::get('peminjaman/{id}', [App\Http\Controllers\API\ApiPeminjamanController::class, 'get']);
Route::post('peminjaman', [App\Http\Controllers\API\ApiPeminjamanController::class, 'store']);
Route::put('peminjaman/{id}', [App\Http\Controllers\API\ApiPeminjamanController::class, 'update']);
Route::delete('peminjaman/{id}', [App\Http\Controllers\API\ApiPeminjamanController::class, 'destroy']);

Route::get('penerbit', [App\Http\Controllers\API\ApiPenerbitController::class, 'get']);
Route::get('penerbit/{id}', [App\Http\Controllers\API\ApiPenerbitController::class, 'get']);
Route::post('penerbit', [App\Http\Controllers\API\ApiPenerbitController::class, 'store']);
Route::put('penerbit/{id}', [App\Http\Controllers\API\ApiPenerbitController::class, 'update']);
Route::delete('penerbit/{id}', [App\Http\Controllers\API\ApiPenerbitController::class, 'destroy']);
