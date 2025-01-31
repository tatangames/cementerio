@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/estiloToggle.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
@stop

<style>
    table{
        /*Ajustar tablas*/
        table-layout:fixed;
    }
</style>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        /* Estilos para centrar el header */
        .centrado {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }

        .form-group-peque input {
            width: 65%;
            padding: 5px;
            font-size: 14px;
        }

        /* Estilos para reducir el tamaño de los inputs */
        .form-group input {
            width: 70%;
            padding: 5px;
            font-size: 14px;
        }

        /* Estilos para alinear elementos en la misma línea */
        .fila {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .fila .form-group {
            flex: 1;
        }
    </style>

<div class="centrado">
    <header>
        <h1>DETALLES</h1>
    </header>
</div>

<div class="modal-body">
    <form id="formulario-nuevo" enctype="multipart/form-data">
        <div class="card-body">

            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">
                <div class="form-group-peque d-flex align-items-center">
                    <label class="me-2">Libro:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" name="libro[]" style="width: auto;">
                </div>

                <div class="form-group-peque d-flex align-items-center">
                    <label>Nicho:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" name="nicho[]">
                </div>
            </div>

            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">

                <div class="form-group d-flex align-items-center">
                    <label>Nombre Primer fallecido</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" name="nombre[]">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de fallecimiento:</label>
                    <input type="date" maxlength="50" autocomplete="off" class="form-control" name="fechafallecimiento[]">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de exhumacion:</label>
                    <input type="date" maxlength="50" autocomplete="off" class="form-control" name="fechaexhumacion[]">
                </div>


            </div>
            <!-- Campos adicionales -->
            <div id="campos-adicionales"></div>

            <!-- Botón para agregar más fallecidos -->
{{--            <button type="button" class="btn btn-primary" onclick="agregarFallecido()">--}}
{{--                Agregar fallecido--}}
{{--            </button>--}}

            <!-- Fila 2: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">

                <div class="form-group">
                    <label>Fecha de vencimiento:</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" name="fechavencimiento[]">
                </div>
                <div class="form-group">
                    <label>Periodo de mora:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="periodo_en_mora[]">
                </div>
                <div class="form-group">
                    <label>Personas en mora:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="persona_en_mora[]">
                </div>
                <div class="form-group">
                    <label>Cancelacion sin el 5% x periodo:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="cancelacion_sin[]">
                </div>
                <div class="form-group">
                    <label>Prox fecha de vencimiento:</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" name="proxfecha[]">
                </div>
            </div>

            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">
                <div class="form-group">
                    <label>Contribuyente que acncela:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" name="contrcancela[]">
                </div>
                <div class="form-group">
                    <label>DUI:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="dui[]">
                </div>
                <div class="form-group">
                    <label>Direccion:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="direccion[]">
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="telefono[]">
                </div>
                <div class="form-group">
                    <label>Periodo cancelado:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="periodocancelado[]">
                </div>


            </div>

            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">


                <div class="form-group">
                    <label>Costo sin el 5%:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="costosin[]">
                </div>
                <div class="form-group">
                    <label>Costo con el 5%:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="costocon[]">
                </div>
                <div class="form-group">
                    <label>Recibo de ingreso(tesoreria):</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="recibo[]">
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso (tesoreria):</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" name="fechateso[]">
                </div>

            </div>




        </div>
    </form>
</div>
