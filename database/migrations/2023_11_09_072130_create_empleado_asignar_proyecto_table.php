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
        Schema::create('empleado_asignar_proyecto', function (Blueprint $table) {
            $table->unsignedInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos')->onDelete('cascade');

            $table->unsignedInteger('id_empleado');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_asignar_proyecto');
    }
};
