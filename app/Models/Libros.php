<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    protected $table = 'registrosce';
    public $timestamps = false;

    protected $fillable = [
        'libro', // Agrega este campo
        'nicho',
        'nombre',
        'fecha_de_fallecimiento',
        'fecha_de_exhumacion',
        'fecha_de_vencimiento',
        'periodo_de_mora',
        'personas_en_mora',
        'cancelacion_sin_5',
        'prox_fecha_vencimiento',
        'contribuyente',
        'dui',
        'direccion',
        'telefono',
        'periodo_cancelados',
        'costo_sin_5',
        'costo_con_5',
        'recibo_tesoreria',
        'fecha_ingreso_tesoreria',

    ];
}
