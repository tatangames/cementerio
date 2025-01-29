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
            $table->string('nicho', 2)->nullable();
            $table->string('Nombre' , 50)->nullable();
            $table->date('fecha_entierro')->nullable();
            $table->date('fecha_exhumacion')->nullable();



            $table->timestamps();
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
