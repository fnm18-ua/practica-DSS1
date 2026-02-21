// 2026_01_01_000007_create_facturas_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('documento_adjunto_id')->unique()->constrained('documentos_adjuntos');
            $table->string('numero');
            $table->string('comercio');
            $table->date('fecha_emision');
            $table->decimal('importe_total', 10, 2);
            $table->string('moneda')->default('EUR');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};