<?php

namespace App\Http\Controllers;

use App\Interfaces\Curriculo as CurriculoInterface;
use App\Models\Curriculo as ModelsCurriculo;
use Illuminate\Http\Request;
use stdClass;

class Curriculo extends Controller implements CurriculoInterface
{

    static public function cadastrar(Request $req)
    {
        $validateData = self::validar($req);
        $validateData['caminho_anexo'] = $req->file('curriculo')->store('curriculos');
        ModelsCurriculo::create($validateData);        
        return response()->json('success');
    }

    static private function validar(Request $req)
    {
        return $req->validate([
            'candidato' => 'required|string|max:255',
            'email' => 'required|email|unique:curriculos,email',
            'telefone' => 'required|string',
            'cargo' => 'required|string',
            'escolaridade' => 'required|string',
            'obs' => 'nullable|string',
            'nome_anexo' => 'required|string',
        ]);
                
    }
}
