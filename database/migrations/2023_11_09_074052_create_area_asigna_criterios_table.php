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
        Schema::create('area_asigna_criterios', function (Blueprint $table) {
            $table->unsignedInteger('id_criterio');
            $table->foreign('id_criterio')->references('id_criterio')->on('criterios')->onDelete('cascade');

            $table->unsignedInteger('id_area');
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_asigna_criterios');
    }
};
