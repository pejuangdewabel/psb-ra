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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'kelas' => 'Api\KelasController'
]);

Route::apiResources([
    'tahun-ajaran' => 'Api\TahunController'
]);

Route::apiResources([
    'informasi' => 'Api\InformasiController'
]);
Route::apiResources([
    'pendaftar' => 'Api\PendaftarController'
]);
Route::apiResources([
    'kelulusan' => 'Api\DiterimaController'
]);
Route::apiResources([
    'user' => 'Api\UserController'
]);
Route::apiResources([
    'admin' => 'Api\AdminController'
]);
