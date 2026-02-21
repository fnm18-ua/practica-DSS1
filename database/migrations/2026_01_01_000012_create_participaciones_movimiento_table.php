// 2026_01_01_000012_create_participaciones_movimiento_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participaciones_movimiento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('movimiento_financiero_id')->constrained('movimientos_financieros');
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->float('porcentaje');
            $table->decimal('importe_asignado', 10, 2);
            $table->boolean('es_pagador')->default(false);
            $table->timestamps();
            
            $table->unique(['movimiento_financiero_id', 'usuario_id'], 'mov_usuario_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participaciones_movimiento');
    }
};