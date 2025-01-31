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



<div id="divcontenedor" style="display: none">


    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Listado</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tablaDatatable">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- modal editar -->
    <div class="modal fade" id="modalEditar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulario-editar">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <input type="hidden" id="id-editar">
                                    </div>

                            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
                            <div class="fila">
                                <div class="form-group-peque d-flex align-items-center">
                                    <label class="me-2">Libro:</label>
                                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="libro" style="width: auto;">
                                </div>

                                <div class="form-group-peque d-flex align-items-center">
                                    <label>Nicho:</label>
                                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nicho">
                                </div>
                            </div>

                            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
                            <div class="fila">

                                <div class="form-group d-flex align-items-center">
                                    <label>Nombre Primer fallecido</label>
                                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nombreeditar">
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label>Fecha de fallecimiento:</label>
                                    <input type="date" maxlength="50" autocomplete="off" class="form-control" id="fechafallecimiento">
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label>Fecha de exhumacion:</label>
                                    <input type="date" maxlength="50" autocomplete="off" class="form-control" id="fechaexhumacion">
                                </div>

                            </div>

                            <!-- Fila 2: Fecha de exhumación y Fecha de vencimiento -->
                            <div class="fila">

                                <div class="form-group">
                                    <label>Fecha de vencimiento:</label>
                                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="fechavencimiento">
                                </div>
                                <div class="form-group">
                                    <label>Periodo de mora:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="periodo_en_mora">
                                </div>
                                <div class="form-group">
                                    <label>Personas en mora:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="persona_en_mora">
                                </div>
                                <div class="form-group">
                                    <label>Cancelacion sin el 5% x periodo:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="cancelacion_sin">
                                </div>
                                <div class="form-group">
                                    <label>Prox fecha de vencimiento:</label>
                                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="proxfecha">
                                </div>
                            </div>

                            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
                            <div class="fila">
                                <div class="form-group">
                                    <label>Contribuyente que cancela:</label>
                                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="contrcancela">
                                </div>
                                <div class="form-group">
                                    <label>DUI:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="dui">
                                </div>
                                <div class="form-group">
                                    <label>Direccion:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="direccion">
                                </div>
                                <div class="form-group">
                                    <label>Telefono:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="telefono">
                                </div>
                                <div class="form-group">
                                    <label>Periodo cancelado:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="periodocancelado">
                                </div>

                            </div>

                            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
                            <div class="fila">

                                <div class="form-group">
                                    <label>Costo sin el 5%:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="costosin">
                                </div>
                                <div class="form-group">
                                    <label>Costo con el 5%:</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="costocon">
                                </div>
                                <div class="form-group">
                                    <label>Recibo de ingreso(tesoreria):</label>
                                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="recibo">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de ingreso (tesoreria):</label>
                                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="fechateso">
                                </div>

                            </div>

                        </div>
                            </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" style="font-weight: bold; background-color: #28a745; color: white !important;" class="button button-rounded button-pill button-small" onclick="editar()">Actualizar</button>
                </div>
                    </form>

                </div>


            </div>

        </div>

    </div>
    <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Permiso Global</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar al usuario?</p>
                    <input type="hidden" id="idborrar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" onclick="borrar()">Borrar</button>
                </div>
            </div>
        </div>
    </div>



    @extends('backend.menus.footerjs')
    @section('archivos-js')

        <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>

        <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/alertaPersonalizada.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                var ruta = "{{ URL::to('admin/editar/index') }}";
                $('#tablaDatatable').load(ruta);

                document.getElementById("divcontenedor").style.display = "block";
            });
        </script>

        <script>

            function recargar(){
                var ruta = "{{ URL::to('/admin/ejemplotabla/index') }}";
                $('#tablaDatatable').load(ruta);
            }

            function modalAgregar(){
                document.getElementById("formulario-nuevo").reset();
                $('#modalAgregar').modal({backdrop: 'static', keyboard: false})
            }



            function informacion(id) {
                openLoading(); // Muestra un loading (puede ser un spinner)
                document.getElementById("formulario-editar").reset(); // Resetea el formulario

                axios.post(url + '/informacion/info-usuario', {
                    'id': id // Envía el ID al servidor
                })
                    .then((response) => {
                        closeLoading(); // Oculta el loading
                        if (response.data.success === 1) { // Si la respuesta es exitosa
                            $('#modalEditar').modal('show'); // Muestra el modal
                            $('#id-editar').val(id);

                            // Llena los campos del formulario con la información recibida
                            const info = response.data.info; // Almacena la información en una variable

                            // Llena los campos del formulario
                            $('#libro').val(info.libro);
                            $('#nicho').val(info.numero_de_nicho);
                            $('#nombreeditar').val(info.nombre);
                            $('#fechafallecimiento').val(info.fecha_de_fallecimiento);
                            $('#fechaexhumacion').val(info.fecha_de_exhumacion);
                            $('#fechavencimiento').val(info.fecha_de_vencimiento);
                            $('#periodo_en_mora').val(info.periodo_de_mora);
                            $('#persona_en_mora').val(info.personas_en_mora);
                            $('#cancelacion_sin').val(info.cancelacion_sin_5);
                            $('#proxfecha').val(info.prox_fecha_venc);
                            $('#contrcancela').val(info.contribuyente);
                            $('#dui').val(info.dui);
                            $('#direccion').val(info.direccion);
                            $('#telefono').val(info.telefono);
                            $('#periodocancelado').val(info.periodo_cancelados);
                            $('#costosin').val(info.costo_sin_5);
                            $('#costocon').val(info.costo_con_5);
                            $('#recibo').val(info.recibo_tesoreria);
                            $('#fechateso').val(info.fecha_ingreso_tesoreria);

                        } else {
                            toastr.error('Información no encontrada'); // Muestra un mensaje de error
                        }
                    })
                    .catch((error) => {
                        closeLoading(); // Oculta el loading en caso de error
                        toastr.error('Información no encontrada'); // Muestra un mensaje de error
                    });
            }

            function editaruser(){
                console.log("hasta aqui")
            }

            function editar() {
                console.log("llego hasta aqui")
                // Obtén los valores del formulario
                var id = document.getElementById('id-editar').value;
                var libro = document.getElementById('libro').value;
                var nicho = document.getElementById('nicho').value;
                var nombre = document.getElementById('nombreeditar').value;
                var fechafallecimiento = document.getElementById('fechafallecimiento').value;
                var fechaexhumacion = document.getElementById('fechaexhumacion').value;
                var fechavencimiento = document.getElementById('fechavencimiento').value;
                var periodo_en_mora = document.getElementById('periodo_en_mora').value;
                var persona_en_mora = document.getElementById('persona_en_mora').value;
                var cancelacion_sin = document.getElementById('cancelacion_sin').value;
                var proxfecha = document.getElementById('proxfecha').value;
                var contrcancela = document.getElementById('contrcancela').value;
                var dui = document.getElementById('dui').value;
                var direccion = document.getElementById('direccion').value;
                var telefono = document.getElementById('telefono').value;
                var periodocancelado = document.getElementById('periodocancelado').value;
                var costosin = document.getElementById('costosin').value;
                var costocon = document.getElementById('costocon').value;
                var recibo = document.getElementById('recibo').value;
                var fechateso = document.getElementById('fechateso').value;

                // Validación básica
                if (nombre === '' || libro === '' || nicho === '') {
                    toastr.error('Nombre, Libro y Nicho son campos requeridos');
                    return;
                }

                // Muestra el loader
                openLoading();

                // Crea el objeto FormData y agrega los datos
                var formData = new FormData();
                formData.append('id', id);
                formData.append('libro', libro);
                formData.append('nicho', nicho);
                formData.append('nombre', nombre);
                formData.append('fechafallecimiento', fechafallecimiento);
                formData.append('fechaexhumacion', fechaexhumacion);
                formData.append('fechavencimiento', fechavencimiento);
                formData.append('periodo_en_mora', periodo_en_mora);
                formData.append('persona_en_mora', persona_en_mora);
                formData.append('cancelacion_sin', cancelacion_sin);
                formData.append('proxfecha', proxfecha);
                formData.append('contrcancela', contrcancela);
                formData.append('dui', dui);
                formData.append('direccion', direccion);
                formData.append('telefono', telefono);
                formData.append('periodocancelado', periodocancelado);
                formData.append('costosin', costosin);
                formData.append('costocon', costocon);
                formData.append('recibo', recibo);
                formData.append('fechateso', fechateso);

                // Envía la solicitud al backend
                axios.post(url + '/editarusuario/editar', formData)
                    .then((response) => {
                        console.log(response);
                        closeLoading();
                        if (response.data.success === 1) {
                            toastr.success('Actualizado correctamente');
                            $('#modalEditar').modal('hide'); // Cierra el modal
                            recargar(); // Recarga los datos en la tabla o vista
                        } else {
                            toastr.error('Error al guardar');
                        }
                    })
                    .catch((error) => {
                        toastr.error('Error al guardar');
                        closeLoading();
                    });
            }
            // se recibe el ID del permiso a eliminar
            function modalBorrarUser(id) {
                console.log("ID recibido para borrar:", id); // Depuración
                $('#idborrar').val(id); // Asigna el ID al campo oculto
                $('#modalBorrar').modal('show'); // Abre el modal
            }

            function borrar(){
                openLoading()
                // se envia el ID del permiso
                var idusuario = document.getElementById('idborrar').value;

                var formData = new FormData();
                formData.append('id', idusuario);

                axios.post(url+'/permisos/extra-borrar-user', formData, {
                })
                    .then((response) => {
                        closeLoading()
                        $('#modalBorrar').modal('hide');

                        if(response.data.success === 1){
                            toastr.success('USUARIO ELIMINADO CORRECTAMENTE');
                            recargar();
                        }else{
                            toastr.error('Error al eliminar');
                        }
                    })
                    .catch((error) => {
                        closeLoading()
                        toastr.error('Error al eliminar');
                    });
            }











        </script>


@endsection
