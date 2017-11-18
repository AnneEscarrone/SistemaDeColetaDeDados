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
    return view('home/mensagem');
});

Route::get('/Home', function () {
    return view('home/home');
});

Route::get('/Contato', function () {
    return view('home/formulario');
});

Route::get('/Login', function () {
    return view('home/login');
});

Route::get('/Carrinho', function () {
    return view('home/carrinho');
});

Route::get('/Cardapio', function () {
    return view('home/cardapio');
});

Route::get('/QuemSomos', function () {
    return view('home/quemSomos');
});

Route::get('/PromocoesDaSemana', function () {
    return view('home/promocoes');
});

Route::get('/Endereco', function () {
    return view('home/endereco');
});
Route::post('/controllerSession', 'ControllerSession@armazenaInformacoesSessao');
