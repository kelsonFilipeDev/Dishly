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
        Schema::create('livro_receita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
            $table->foreignId('receita_id')->constrained('receita')->onDelete('cascade');
            $table->boolean('republicacao')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_receita');
    }
};
