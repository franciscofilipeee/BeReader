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
        Schema::create('livros_usados_fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usado_id');
            $table->foreign('usado_id')->references('id')->on('livros_usados');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros_usados_fotos');
    }
};
