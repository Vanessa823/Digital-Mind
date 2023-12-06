<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            
            $table->increments('id_empleado');
            $table->string('nombre_empleado', 100);
            $table->string('puesto', 100);
            $table->string('email', 100);
            $table->char('telefono', 10);

            
            // $table->unsignedInteger('id_proyecto')->nullable();
            // $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
