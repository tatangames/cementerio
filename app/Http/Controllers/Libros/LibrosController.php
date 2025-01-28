<?php

namespace App\Http\Controllers\Libros;

use App\Http\Controllers\Controller;


class LibrosController extends Controller
{
    public function vistaLibro1(){
        return view('backend.admin.libros.vistaLibro1');
    }
    public function vistaTablaLibro1()
    {
        return view('backend.admin.libros.tablaLibro1');
    }
}
