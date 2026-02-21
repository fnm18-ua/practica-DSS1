// 2026_01_01_000003_create_membresias_grupo_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membresias_grupo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->foreignUuid('grupo_id')->constrained('grupos');
            $table->date('fecha_alta');
            $table->enum('rol', ['ADMIN', 'MIEMBRO'])->default('MIEMBRO');
            $table->enum('estado', ['PENDIENTE', 'ACTIVA', 'BLOQUEADA'])->default('PENDIENTE');
            $table->timestamps();
            
            $table->unique(['usuario_id', 'grupo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membresias_grupo');
    }
};