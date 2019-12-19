<?php

namespace App\Route;

use \App\Config\Route;

Route::get('/api/pessoa/', 'PessoaController@index');
Route::post('/api/pessoa/new', 'PessoaController@new');