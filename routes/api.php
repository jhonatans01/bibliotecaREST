<?php

use Illuminate\Http\Request;

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

Route::get('/idiomas', 'IdiomaController@index');
Route::post('/idiomas', 'IdiomaController@store');
Route::put('/idiomas/edit/{id}', 'IdiomaController@update');
Route::delete('/idiomas/delete/{id}', 'IdiomaController@delete');

Route::get('/generos', 'GeneroController@index');
Route::post('/generos', 'GeneroController@store');
Route::put('/generos/edit/{id}', 'GeneroController@update');
Route::delete('/generos/delete/{id}', 'GeneroController@delete');
