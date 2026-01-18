<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->foreignId('id_producto')->constrained('productos', 'id_producto');
            $table->enum('tipo_movimiento', ['ENTRADA', 'SALIDA']);
            $table->integer('cantidad_movimiento');
            $table->timestamp('fecha_movimiento')->useCurrent();
            $table->string('descripcion_movimiento', 150)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
