<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/binar', 'BinarController@getBinar');
Route::post('/binar/create-cell', 'BinarController@createCell');
Route::get('/binar/cell/delete/{id}', 'BinarController@deleteCell');
Route::get('/binar/get-cell-by-id/{id}', 'BinarController@getCellById');
Route::get('/binar/fill-in-binar', 'BinarController@fillInBinar');