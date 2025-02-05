<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fallecidos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'registrofallecidos';

    protected $fillable = [
        'nombre',
        'fecha_de_fallecimiento',
        'fecha_de_exhumacion',
        'id_registrosce'
    ];

    // Relación con el modelo RegistrosCE (suponiendo que se llame así)
    public function libros()
    {
        return $this->belongsTo(Libros::class, 'id_registrosce');
    }
}
