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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // Requerente
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->date('data_abertura')->default(now());
            $table->date('data_inicio_desenvolvimento')->nullable();
            $table->date('data_fechamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
