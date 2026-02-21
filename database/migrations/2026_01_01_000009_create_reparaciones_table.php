// 2026_01_01_000009_create_reparaciones_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('producto_id')->constrained('productos');
            $table->date('fecha');
            $table->text('descripcion');
            $table->decimal('coste', 10, 2);
            $table->string('proveedor_servicio');
            $table->text('piezas_sustituidas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};