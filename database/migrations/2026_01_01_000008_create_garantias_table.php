// 2026_01_01_000008_create_garantias_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('garantias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('producto_id')->nullable()->unique()->constrained('productos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('tipo', ['LEGAL', 'COMERCIAL', 'EXTENDIDA']);
            $table->string('proveedor');
            $table->text('condiciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garantias');
    }
};