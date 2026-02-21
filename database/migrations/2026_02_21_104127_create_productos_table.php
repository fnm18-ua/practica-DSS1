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
    	Schema::create('productos', function (Blueprint $table) {
		$table->uuid('id')->primary();
		$table->foreignUuid('usuario_id')->constrained('users')->cascadeOnDelete();
		$table->string('nombre');
		$table->string('marca')->nullable();
		$table->string('modelo')->nullable();
		$table->date('fecha_compra')->nullable();
		$table->decimal('precio_compra', 10, 2)->nullable();
		$table->timestamps();
    	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
