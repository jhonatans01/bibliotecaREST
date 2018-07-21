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
Route::get('/idiomas/{id}', 'IdiomaController@show');
Route::post('/idiomas', 'IdiomaController@store');
Route::put('/idiomas/edit/{id}', 'IdiomaController@update');
Route::delete('/idiomas/delete/{id}', 'IdiomaController@delete');

Route::get('/generos', 'GeneroController@index');
Route::get('/generos/{id}', 'GeneroController@show');
Route::post('/generos', 'GeneroController@store');
Route::put('/generos/edit/{id}', 'GeneroController@update');
Route::delete('/generos/delete/{id}', 'GeneroController@delete');

Route::get('/autores', 'AutorController@index');
Route::get('/autores/{id}', 'AutorController@show');
Route::post('/autores', 'AutorController@store');
Route::put('/autores/edit/{id}', 'AutorController@update');
Route::delete('/autores/delete/{id}', 'AutorController@delete');

Route::get('/livros', 'LivroController@index');
Route::get('/livros/{id}', 'LivroController@show');
Route::post('/livros', 'LivroController@store');
Route::put('/livros/edit/{id}', 'LivroController@update');
Route::delete('/livros/delete/{id}', 'LivroController@delete');

Route::get('/usuarios', 'UsuarioController@index');
Route::get('/usuarios/{id}', 'UsuarioController@show');
Route::post('/usuarios', 'UsuarioController@store');
Route::put('/usuarios/edit/{id}', 'UsuarioController@update');
Route::delete('/usuarios/delete/{id}', 'UsuarioController@delete');

Route::get('/perfis', 'PerfilController@index');
Route::get('/perfis/{id}', 'PerfilController@show');

Route::get('/emprestimos', 'EmprestimoController@index');
Route::get('/emprestimos/{id}', 'EmprestimoController@show');
Route::post('/emprestimos', 'EmprestimoController@store');
Route::put('/emprestimos/edit/{id}', 'EmprestimoController@update');
Route::delete('/emprestimos/delete/{id}', 'EmprestimoController@delete');
