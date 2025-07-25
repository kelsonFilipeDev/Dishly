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
        Schema::create('restaurante', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('provincia');
            $table->enum('categoria', ['luxo', 'simples', 'premium']);
            $table->unsignedInteger('capacidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurante');
    }
};
