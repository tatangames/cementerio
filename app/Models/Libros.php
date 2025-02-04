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
        'fechafallecimiento',
        'fechaexhumacion',
        'fechavencimiento',
        'periodo_en_mora',
        'persona_en_mora',
        'cancelacion_sin',
        'proxfecha',
        'contrcancela',
        'dui',
        'direccion',
        'telefono',
        'periodocancelado',
        'costosin',
        'costocon',
        'recibo',
        'fechateso',
    ];
}
