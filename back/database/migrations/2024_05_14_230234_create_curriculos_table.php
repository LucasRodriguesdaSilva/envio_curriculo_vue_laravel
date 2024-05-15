<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id();
            $table->string('candidato');
            $table->string('email');
            $table->string('telefone',100);
            $table->string('cargo',255);
            $table->string('obs')->nullable();
            $table->string('nome_anexo');
            $table->string('caminho_anexo');
            $table->string('escolaridade',255);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculos');
    }
};
