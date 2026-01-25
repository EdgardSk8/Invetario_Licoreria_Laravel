<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');

            // Datos básicos
            $table->string('nombre_usuario', 100);
            $table->string('usuario_login', 50)->unique();
            $table->string('contrasenia', 255);

            // Datos legales del trabajador
            $table->string('documento_identificacion', 20)->unique();
            $table->date('fecha_nacimiento');
            $table->string('direccion', 150);
            $table->string('telefono', 20);
            $table->date('fecha_ingreso');

            // Relación con roles
            $table->foreignId('id_rol')
                  ->constrained('roles', 'id_rol');

            // Fechas de control
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
