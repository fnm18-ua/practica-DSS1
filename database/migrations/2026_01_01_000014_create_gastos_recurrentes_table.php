// 2026_01_01_000014_create_gastos_recurrentes_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gastos_recurrentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->foreignUuid('doc_soporte_id')->nullable()->constrained('documentos_adjuntos');
            $table->string('nombre');
            $table->decimal('importe', 10, 2);
            $table->enum('periodicidad', ['SEMANAL', 'MENSUAL', 'TRIMESTRAL', 'ANUAL']);
            $table->date('proxima_fecha');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gastos_recurrentes');
    }
};