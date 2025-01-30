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
        Schema::create('registrofallecidos', function (Blueprint $table) {
            $table->id();



            // Información del fallecido
            $table->string('Nombre', 50)->nullable();
            $table->date('fecha_entierro')->nullable();
            $table->date('fecha_exhumacion')->nullable();

            // Relación con la tabla "registro"
            $table->bigInteger('id_registrosce')->unsigned()->nullable();


            // Definir la clave foránea compuesta
            $table->foreign('id_registrosce')->references('id')->on('registrosce');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrofallecidos');
    }
};
