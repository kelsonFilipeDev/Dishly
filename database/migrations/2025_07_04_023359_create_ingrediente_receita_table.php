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
        Schema::create('ingrediente_receita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receita_id')->constrained('receita')->onDelete('cascade');
            $table->foreignId('ingrediente_id')->constrained('ingrediente')->onDelete('cascade');
            $table->string('quantidade');
            $table->string('unidade_medida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingrediente_receita');
    }
};
