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
        Schema::create('registrosce', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental

            // Información principal
            $table->string('libro', 50);
            $table->string('nombre', 50);
            $table->string('numero_de_nicho', 8)->nullable();

            // Fechas relevantes
            $table->date('fecha_de_fallecimiento')->nullable();
            $table->date('fecha_de_exhumacion')->nullable();
            $table->date('fecha_de_vencimiento')->nullable();

            // Información adicional
            $table->unsignedInteger('periodo_de_mora')->nullable(); // Cambiado a unsigned
            $table->text('personas_en_mora')->nullable();
            $table->decimal('cancelacion_sin_5', 8, 2)->nullable();
            $table->date('prox_fecha_venc')->nullable();

            // Cancelación refrendas
            $table->string('contribuyente', 50)->nullable();
            $table->string('dui', 10)->nullable();
            $table->string('direccion', 150); // Eliminado unique()
            $table->string('telefono', 8)->nullable();
            $table->string('periodo_cancelados', 2)->nullable();
            $table->decimal('costo_sin_5', 8, 2)->nullable(); // Cambiado a 8,2 para mayor precisión
            $table->decimal('costo_con_5', 8, 2)->nullable(); // Ahora decimal en lugar de string
            $table->string('recibo_tesoreria', 10)->nullable()->unique();
            $table->date('fecha_ingreso_tesoreria')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrosce');
    }
};
