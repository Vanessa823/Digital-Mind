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
        Schema::create('criterios_califica_empleados', function (Blueprint $table) {
            $table->unsignedInteger('id_empleado');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');

            $table->unsignedInteger('id_area');
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');

            $table->unsignedInteger('id_criterio');
            $table->foreign('id_criterio')->references('id_criterio')->on('criterios')->onDelete('cascade');

            $table->unsignedInteger('id_periodo');
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos')->onDelete('cascade');


            $table->integer('calificacion');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterios_califica_empleados');
    }
};
