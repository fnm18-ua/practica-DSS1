<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    	Schema::create('reparaciones', function (Blueprint $table) {
		$table->uuid('id')->primary();
		$table->foreignUuid('producto_id')->constrained('productos')->cascadeOnDelete();
		$table->date('fecha');
		$table->string('descripcion');
		$table->decimal('coste', 10, 2)->nullable();
		$table->string('proveedor_servicio')->nullable();
		$table->text('piezas_sustituidas')->nullable();
		$table->timestamps();
    	});
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparacions');
    }
};
