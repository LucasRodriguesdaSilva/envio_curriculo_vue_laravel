<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Curriculo
{
    public function cadastrar(Request $req);
}
