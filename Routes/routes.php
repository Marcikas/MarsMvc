<?php

namespace App\Route;

use App\Config\Route;

Route::get('/api/pessoa/', 'PessoaController@index');
Route::post('/api/pessoa/new', 'PessoaController@new');
Route::get('/inicio', 'HomeController@index');
Route::get('/api/teste', 'PessoaController@get');
Route::get('/teste', 'HomeController@teste');
Route::get('/teste2', 'HomeController@teste2');
