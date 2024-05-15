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
            $table->string('telefone',length: 50);
            $table->string('cargo');
            $table->text('obs')->nullable();
            $table->string('nome_anexo');
            $table->string('tipo_anexo');
            $table->string('caminho_anexo');
            $table->string('escolaridade',length:100);
            $table->string('ip', length:50);
            $table->timestamp('data_hora_envio_email')->nullable();
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
