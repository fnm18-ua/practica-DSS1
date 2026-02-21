// 2026_01_01_000011_create_movimientos_financieros_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos_financieros', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('usuario_id')->constrained('usuarios');
            $table->foreignUuid('categoria_id')->nullable()->constrained('categorias');
            $table->foreignUuid('grupo_id')->nullable()->constrained('grupos');
            $table->enum('tipo', ['INGRESO', 'GASTO']);
            $table->decimal('importe', 10, 2);
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('origen')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_financieros');
    }
};