<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidato',
        'email',
        'telefone',
        'cargo',
        'escolaridade',
        'obs',
        'nome_anexo',
        'caminho_anexo'
    ];
}
