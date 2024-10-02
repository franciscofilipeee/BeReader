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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('autor');
            $table->string('data_lancamento');
            $table->string('edicao');
            $table->string('capa');
            $table->longText('sinopse');
            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('temas_livros');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->float('nota_media');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
