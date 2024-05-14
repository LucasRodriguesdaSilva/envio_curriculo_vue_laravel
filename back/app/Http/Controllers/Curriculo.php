<?php

namespace App\Http\Controllers;

use App\Interfaces\Curriculo as CurriculoInterface;
use Illuminate\Http\Request;
use stdClass;

class Curriculo extends Controller implements CurriculoInterface
{

    public function cadastrar(Request $req)
    {
        $dados = $req->json()->all();
        return json_encode($dados); 
    }

    private function validar(stdClass $dados)
    {
        
    }
}
