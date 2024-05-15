<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface Curriculo
{
   static public function cadastrar(Request $req);
}
