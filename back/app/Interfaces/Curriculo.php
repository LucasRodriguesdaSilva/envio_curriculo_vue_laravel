<?php

namespace App\Interfaces;

use App\Models\Curriculo as ModelsCurriculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface Curriculo
{
   static public function preparaCadastro(Request $req): JsonResponse;
   static public function cadastrar(array $dados_validados): ModelsCurriculo;
}
