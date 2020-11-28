<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Admin\AdminPageController@index')->middleware('cek.login');
Route::get('/login', 'Admin\AdminPageController@login');
Route::post('/login', 'LoginController@login');

Route::group(['prefix' => 'kelas'], function () {
    Route::get('/', 'Admin\AdminPageController@kelas');
    Route::get('/data', 'Admin\KelasController@getKelas');
});
Route::group(['prefix' => 'inventory'], function () {
    Route::get('/', 'Admin\AdminPageController@inventory');
    Route::get('/data', 'Admin\KelasController@getKelas');
});
