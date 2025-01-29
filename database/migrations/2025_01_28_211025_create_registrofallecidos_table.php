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

            // Relación con la tabla "registro"
            $table->string('libro', 50); // Referencia al libro
            $table->string('nicho', 8); // Referencia al número de nicho

            // Información del fallecido
            $table->string('Nombre', 50)->nullable();
            $table->date('fecha_entierro')->nullable();
            $table->date('fecha_exhumacion')->nullable();


            // Definir la clave foránea compuesta
            $table->foreign(['libro', 'nicho'])->references(['libro', 'numero_de_nicho'])->on('registro')->onDelete('cascade');
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
