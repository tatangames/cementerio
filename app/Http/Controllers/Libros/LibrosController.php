<?php

namespace App\Http\Controllers\Libros;

use App\Http\Controllers\Controller;
use App\Models\Libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LibrosController extends Controller
{
    public function vistaLibro1(){
        return view('backend.admin.libros.vistaregistros');
    }
    public function vistaTablaLibro1()
    {
        return view('backend.admin.libros.tablas.vistaregistros');
    }

    public function registroGuardar(Request $request)
    {
        DB::beginTransaction();

        try {

            $dato = new Proveedores();
            $dato->nombre = $request->nombre;
            $dato->id_usuarios = $request->usuario;
            $dato->numero = $request->telefono;
            $dato->genero = $request->genero;
            if ($dato->save()) {
                DB::commit();
                return ['success' => 1];
            } else {
                return ['success' => 2];
            }


        } catch (\Throwable $e) {
            Log::info('error ' . $e);
            DB::rollback();
            return ['success' => 99];
        }


    }
}
