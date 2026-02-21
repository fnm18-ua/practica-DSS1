// 2026_01_01_000005_create_pasaportes_digitales_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasaportes_digitales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('producto_id')->unique()->constrained('productos');
            $table->string('codigo')->unique();
            $table->date('fecha_creacion');
            $table->string('hash_validacion');
            $table->boolean('es_transferible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasaportes_digitales');
    }
};