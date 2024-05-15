<?php

namespace App\Interfaces;

use App\Models\Curriculo;

interface CurriculoMail
{
   static public function enviarEmail(Curriculo $modelsCurriculo);
}
