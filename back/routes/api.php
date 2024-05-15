<?php

use App\Http\Controllers\Curriculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return json_encode(['status' => 200, 'retorno' => 'Ok']);
});

Route::post('/curriculo/cadastrar',[Curriculo::class, 'preparaCadastro']);