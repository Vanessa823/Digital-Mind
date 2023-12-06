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
        Schema::create('proyecto_asigna_tarea', function (Blueprint $table) {
            $table->unsignedInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos')->onDelete('cascade');

            $table->unsignedInteger('id_tarea');
            $table->foreign('id_tarea')->references('id_tarea')->on('tareas')->onDelete('cascade');
            $table->string('estado', 100)->default('pendiente');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_asigna_tarea');
    }
};
