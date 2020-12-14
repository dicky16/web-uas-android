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

Route::get('/tes', 'API\LoginController@get');
Route::post('/login', 'API\LoginController@login');
//route must have token
Route::group(['prefix' => 'v1', 'middleware' => 'jwt.verify'], function () {
// Route::group(['prefix' => 'v1'], function () {
    Route::get('/get', function () {
        return response()->json(['data' => 'data']);
    });

    Route::get('/kelas', 'API\KelasController@getKelas');
    Route::post('/pinjam', 'API\KelasController@pinjamKelas');
});
