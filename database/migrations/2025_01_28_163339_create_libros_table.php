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
        Schema::create('libro1', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental

            // Información principal
            $table->string('nombre', 50); // Nombre con longitud máxima de 50 caracteres
            $table->string('numero_de_nicho', 8)->nullable(); // Número de nicho opcional

            // Fechas relevantes
            $table->date('fecha_de_fallecimiento')->nullable(); // Fecha de fallecimiento (tipo date, opcional)
            $table->date('fecha_de_exhumacion')->nullable(); // Fecha de exhumación (tipo date, opcional)
            $table->date('fecha_de_vencimiento')->nullable(); // Fecha de vencimiento (tipo date, opcional)

            // Información adicional
            $table->integer('periodo_de_mora')->nullable(); // Periodo de mora (tipo entero, opcional)
            $table->text('personas_en_mora')->nullable(); // Personas en mora (tipo text para mayor longitud, opcional)
            $table->boolean('cancelacion')->default(false); // Indicador de cancelación (boolean con default false)
            $table->date('prox_fecha_venc')->nullable(); // Próxima fecha de vencimiento (tipo date, opcional)



            // Timestamps
            $table->timestamps(); // Agrega columnas created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
