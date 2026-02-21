// 2026_01_01_000016_create_aportes_ahorro_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aportes_ahorro', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('objetivo_ahorro_id')->constrained('objetivos_ahorro');
            $table->date('fecha');
            $table->decimal('importe', 10, 2);
            $table->string('nota')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aportes_ahorro');
    }
};