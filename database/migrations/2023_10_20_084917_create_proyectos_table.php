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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id_proyecto');
            $table->string('nombre_proyecto', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_entrega');
            $table->integer('avance')->nullable();;
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
