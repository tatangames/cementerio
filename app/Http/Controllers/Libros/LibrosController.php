<?php

namespace App\Http\Controllers\Libros;

use App\Http\Controllers\Controller;
use App\Models\Libros;
use App\Models\Proveedores;
use App\Models\Usuario;
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
    public function vistaTabla(){
        $arraylibros = Libros::take(10)->get();
        return view('backend.admin.libros.tablas.tablavistaregistro', compact('arraylibros'));
    }
    public function vistaLibrosEditar()
    {

        return view('backend.admin.libros.vistaeditar');
    }

    public function buscarfallecido(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

//            $pilaObjEspeci = array();
//            $infoAuth = auth()->user();
//            $arrayCodigo = BodegaUsuarioObjEspecifico::where('id_usuario', $infoAuth->id)->get();

//            foreach ($arrayCodigo as $fila) {
//                array_push($pilaObjEspeci, $fila->id_objespecifico);
//            }


            $data = Libros::where('nombre', 'LIKE', "%{$query}%")
//                ->whereIn('id_objespecifico', $pilaObjEspeci)
                ->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative; overflow: auto; max-height: 300px; width: 550px">';
            $tiene = true;
            foreach ($data as $row) {
                $infofallecido = Libros::where('id', $row->id)->first();
                $nombreCompleto = $row->nombre . " (" . $infofallecido->nombre . ")";

                // si solo hay 1 fila, No mostrara el hr, salto de linea
                if (count($data) == 1) {
                    if (!empty($row)) {
                        $tiene = false;
                        $output .= '
                 <li class="cursor-pointer" onclick="modificarValor(this)" id="' . $row->id . '">' . $nombreCompleto . '</li>
                ';
                    }
                } else {
                    if (!empty($row)) {
                        $tiene = false;
                        $output .= '
                 <li class="cursor-pointer" onclick="modificarValor(this)" id="' . $row->id . '">' . $nombreCompleto . '</li>
                   <hr>
                ';
                    }
                }
            }
            $output .= '</ul>';
            if ($tiene) {
                $output = '';
            }
            echo $output;
        }
    }

    public function mostrarDetalle($id)
    {
        $fallecido = Libros::findOrFail($id);  // Obtener el fallecido por su ID
        return view('backend.admin.libros.detalle', compact('fallecido'));
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

    public function infoUsuarios(Request $request)
    {
        // Busca el proveedor por ID
        $info = Libros::where('id', $request->id)->first();

        if ($info) {
            // Obtén todos los usuarios para llenar el select
            $usuarios = Usuario::all()->pluck('nombre', 'id')->toArray();

            return [
                'success' => 1,
                'info' => $info // Información del proveedor

            ];
        } else {
            // Si no se encuentra el proveedor, devuelve un error
            return ['success' => 2];
        }
    }

    public function registroEditar(Request $request)
    {
        Log::info('Datos recibidos:', $request->all());
        // Busca el registro por ID
        $libro = Libros::find($request->id);

        if ($libro) {
            // Inicia la transacción
            DB::beginTransaction();

            try {
                Libros::where('id', $request->id)->update([
                    'libro' => $request->libro,
                    'numero_de_nicho' => $request->nicho,
                    'nombre' => $request->nombre,
                    'fecha_de_fallecimiento' => $request->fechafallecimiento, // Cambiado
                    'fecha_de_exhumacion' => $request->fechaexhumacion, // Cambiado
                    'fecha_de_vencimiento' => $request->fechavencimiento, // Cambiado
                    'periodo_de_mora' => $request->periodo_en_mora, // Cambiado
                    'personas_en_mora' => $request->persona_en_mora, // Cambiado
                    'cancelacion_sin_5' => $request->cancelacion_sin, // Cambiado
                    'prox_fecha_venc' => $request->proxfecha, // Cambiado
                    'contribuyente' => $request->contrcancela, // Cambiado
                    'dui' => $request->dui,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'periodo_cancelados' => $request->periodocancelado, // Cambiado
                    'costo_sin_5' => $request->costosin, // Cambiado
                    'costo_con_5' => $request->costocon, // Cambiado
                    'recibo_tesoreria' => $request->recibo, // Cambiado
                    'fecha_ingreso_tesoreria' => $request->fechateso, // Cambiado
                ]);

                // Confirma la transacción
                DB::commit();
                return response()->json(['success' => 1]); // Éxito
            } catch (\Throwable $e) {
                // Revierte la transacción en caso de error
                DB::rollback();

                // Registra el error para depuración
                Log::error('Error al actualizar el registro: ' . $e->getMessage());

                return response()->json(['success' => 99, 'error' => $e->getMessage()]); // Error durante la transacción
            }
        } else {
            return response()->json(['success' => 3]); // Registro no encontrado
        }
    }
}
