<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ValidarRequest
{
    static public function validar(Request $req);
}
