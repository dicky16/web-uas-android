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

Route::group(['middleware' => 'cek.login'], function () {
    Route::group(['prefix' => 'kelas'], function () {
        Route::get('/', 'Admin\AdminPageController@kelas');
        Route::get('/data', 'Admin\KelasController@getKelas');
        Route::get('/tambah', 'Admin\KelasController@store');
        Route::get('/delete/{id}', 'Admin\KelasController@destroy');
        Route::get('/edit/{id}', 'Admin\KelasController@edit');
        Route::get('/update/{id}', 'Admin\KelasController@update');
        Route::get('/id', 'Admin\KelasController@getLastId');
    });
    Route::group(['prefix' => 'inventory'], function () {
        Route::get('/', 'Admin\AdminPageController@inventory');
        Route::post('/', 'Admin\InventoryController@store');
        Route::get('/data', 'Admin\InventoryController@getInventory');
        Route::get('/kelas', 'Admin\InventoryController@getKelas');
        Route::get('/edit/{id}', 'Admin\InventoryController@edit');
        Route::post('/update/{id}', 'Admin\InventoryController@update');
        Route::get('/delete/{id}', 'Admin\InventoryController@destroy');
    });

});

// Route::get('t', 'Admin\InventoryController@store');
