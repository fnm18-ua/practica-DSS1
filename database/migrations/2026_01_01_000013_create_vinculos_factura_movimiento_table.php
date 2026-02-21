// 2026_01_01_000013_create_vinculos_factura_movimiento_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vinculos_factura_movimiento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('movimiento_financiero_id')->constrained('movimientos_financieros');
            $table->foreignUuid('factura_id')->constrained('facturas');
            $table->decimal('importe_imputado', 10, 2);
            $table->string('nota')->nullable();
            $table->timestamps();
            
            $table->unique(['movimiento_financiero_id', 'factura_id'], 'mov_factura_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vinculos_factura_movimiento');
    }
};