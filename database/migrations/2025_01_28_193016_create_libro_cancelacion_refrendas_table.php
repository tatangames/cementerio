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
        Schema::create('libro_cancelacion_refrendas', function (Blueprint $table) {
            $table->id();
            $table->string('contribuyente' , 50)->nullable();
            $table->string('dui' , 10)->nullable();
            $table->string('direccion' , 150)->unique();
            $table->string('telefono' , 8)->nullable();
            $table->string('periodo_cancelados' , 2)->nullable();
            $table->decimal('costo_sin_5', 4, 2)->nullable();
            $table->string('costo_con_5', 4, 2)->nullable();
            $table->string('recibo_tesoreria', 10)->nullable()->unique();
            $table->date('fecha_ingreso_tesoreria')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_cancelacion_refrendas');
    }
};
