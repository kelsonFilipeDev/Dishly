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
            Schema::create('receita', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->unsignedBigInteger('cozinheiro_id');
                $table->unsignedBigInteger('categoria_id');
                $table->foreign('cozinheiro_id')->references('users')->on('id')->onDelete('cascade');
                $table->foreign('cozinheiro_id')->references('categoria')->on('id')->onDelete('cascade')->nullable();
                $table->string('name');
                $table->text('modo_preparo');
                $table->unsignedTinyInteger('porcoes');
                $table->date('data_criacao');
                $table->timestamps();

                $table->unique(['nome', 'cozinheiro_id']);
            });

        }

        /**
        * Reverse the migrations.
        */
        public function down(): void
        {
            Schema::dropIfExists('receita');
        }
    };
