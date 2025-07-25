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
        Schema::create('teste_degustacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('degustador_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receita_id')->constrained('receita')->onDelete('cascade');
            $table->unsignedTinyInteger('nota');
            $table->text('comentario')->nullable();
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teste_degustacao');
    }
};
