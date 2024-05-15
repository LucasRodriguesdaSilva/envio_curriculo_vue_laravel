<?php

namespace App\Http\Controllers;

use App\Interfaces\Curriculo as CurriculoInterface;
use App\Interfaces\CurriculoMail;
use App\Interfaces\ValidarRequest;
use App\Mail\EnviarCurriculoRh;
use App\Models\Curriculo as ModelsCurriculo;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class Curriculo extends Controller implements CurriculoInterface, CurriculoMail, ValidarRequest
{

    static function preparaCadastro(Request $req): JsonResponse
    {
        $dados_validados = self::validar($req);

        $dados_validados['caminho_anexo'] = $req->file('curriculo')->store('curriculos');
        $dados_validados['tipo_anexo'] =  $req->file('curriculo')->getMimeType();
        $dados_validados['ip'] = $req->ip();
        
        $modelsCurriculo = self::cadastrar($dados_validados);
        self::enviarEmail($modelsCurriculo);       
 
        return response()->json(['success']);
    }

    static function cadastrar(array $dadosValidados): ModelsCurriculo
    {
        return ModelsCurriculo::create($dadosValidados);
    }

    static function enviarEmail(ModelsCurriculo $modelsCurriculo)
    {
        Mail::to('destinatario@example.com')
            ->send(new EnviarCurriculoRh($modelsCurriculo));

        self::cadastrarDataHoraEnvioEmail($modelsCurriculo);

        return true;
    }

    static private function cadastrarDataHoraEnvioEmail(ModelsCurriculo $modelsCurriculo)
    {
        $modelsCurriculo->data_hora_envio_email = Carbon::now();
        $modelsCurriculo->save();
    }

    static function validar(Request $req): Array
    {
        return $req->validate([
            'candidato' => 'required|string|max:255',
            'email' => 'required|email|unique:curriculos,email',
            'telefone' => 'required|string',
            'cargo' => 'required|string',
            'escolaridade' => 'required|string',
            'obs' => 'nullable|string',
            'nome_anexo' => 'required|string',
            'curriculo' => 'required|file|mimes:pdf,doc,docx|max:1054'
        ]);
                
    }
}
