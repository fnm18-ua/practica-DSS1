// 2026_01_01_000017_create_transferencias_pasaporte_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transferencias_pasaporte', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pasaporte_id')->constrained('pasaportes_digitales');
            $table->foreignUuid('vendedor_id')->constrained('usuarios');
            $table->foreignUuid('comprador_id')->constrained('usuarios');
            $table->dateTime('fecha');
            $table->enum('estado', ['INICIADA', 'ACEPTADA', 'RECHAZADA', 'CANCELADA'])->default('INICIADA');
            $table->string('token_verificacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transferencias_pasaporte');
    }
};