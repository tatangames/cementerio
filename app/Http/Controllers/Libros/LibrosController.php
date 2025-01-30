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
        $arraylibros = Libros::all();
        return view('backend.admin.dashboard.vistadashboard', compact('arraylibros'));
    }

    public function registroGuardar(Request $request)
    {
        DB::beginTransaction();

        try {
            // Crear un nuevo registro en la base de datos
            $dato = new Libros();

            // Asignar los valores del formulario a los campos del modelo
            $dato->libro = $request->libro;
            $dato->numero_de_nicho = $request->nicho;
            $dato->nombre = $request->nombre;
            $dato->fecha_de_fallecimiento = $request->fechaFallecimiento;
            $dato->fecha_de_exhumacion = $request->fechaExhumacion;
            $dato->fecha_de_vencimiento = $request->fechaVencimiento;
            $dato->periodo_de_mora = $request->periodoMora;
            $dato->personas_en_mora = $request->personaMora;
            $dato->cancelacion_sin_5 = $request->cancelacionSin;
            $dato->prox_fecha_venc = $request->proxFecha;
            $dato->contribuyente = $request->contribuyente;
            $dato->dui = $request->dui;
            $dato->direccion = $request->direccion;
            $dato->telefono = $request->telefono;
            $dato->periodo_cancelados = $request->periodoCancelado;
            $dato->costo_sin_5 = $request->costoSin;
            $dato->costo_con_5 = $request->costoCon;
            $dato->recibo_tesoreria = $request->reciboIngreso;
            $dato->fecha_ingreso_tesoreria = $request->fechaIngreso;

            // Guardar el registro en la base de datos
            if ($dato->save()) {
                DB::commit();
                return ['success' => 1]; // Éxito
            } else {
                DB::rollback();
                return ['success' => 2]; // Error al guardar
            }
        } catch (\Throwable $e) {
            Log::error('Error en registroGuardar: ' . $e->getMessage()); // Registrar el error
            DB::rollback();
            return ['success' => 99]; // Error inesperado
        }
    }
}
