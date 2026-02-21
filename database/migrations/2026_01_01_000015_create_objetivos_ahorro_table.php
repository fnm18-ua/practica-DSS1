// 2026_01_01_000015_create_objetivos_ahorro_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objetivos_ahorro', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->string('nombre');
            $table->decimal('cantidad_objetivo', 10, 2);
            $table->decimal('cantidad_actual', 10, 2)->default(0);
            $table->date('fecha_inicio');
            $table->date('fecha_limite')->nullable();
            $table->enum('estado', ['EN_PROGRESO', 'COMPLETADO', 'PAUSADO'])->default('EN_PROGRESO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objetivos_ahorro');
    }
};