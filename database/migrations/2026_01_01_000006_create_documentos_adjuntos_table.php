// 2026_01_01_000006_create_documentos_adjuntos_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentos_adjuntos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->foreignUuid('producto_id')->nullable()->constrained('productos');
            $table->foreignUuid('pasaporte_id')->nullable()->constrained('pasaportes_digitales');
            $table->enum('tipo', ['FACTURA', 'MANUAL', 'TICKET', 'CERTIFICADO', 'FOTO', 'OTRO']);
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->date('fecha_subida');
            $table->string('tipo_documentoable_type')->nullable(); // Para polimórfica si se necesita
            $table->uuid('tipo_documentoable_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos_adjuntos');
    }
};