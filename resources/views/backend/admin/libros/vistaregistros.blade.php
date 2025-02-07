@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/estiloToggle.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">


@stop





<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        table{
            /*Ajustar tablas*/
            table-layout:fixed;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }
        .header img {
            width: 150px;
            height: auto;
        }

        .form-group-peque input {
            width: 40%;
            padding: 5px;
            font-size: 14px;
        }

        /* Estilos para reducir el tamaño de los inputs */
        .form-group input {
            width: 65%;
            padding: 5px;
            font-size: 14px;
        }
        body {
            background-color: #001f3f !important;

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

        .title-container {
            margin: 10px 0;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold; /* Título en negrita */
            color: #FFFFFF;
            margin-bottom: 10px;
        }
        label{
            color: white;
        }

        @media (max-width: 768px) {
            .header img {
                width: 120px;
            }

            .title {
                font-size: 1.8rem;
            }


        }
    </style>
</head>
<div class="header">
    <img src="{{ asset('images/alcal_metapan.png') }}" alt="Imagen Izquierda">
    <div class="title-container">
        <div class="title">Registro Nuevo</div>
    </div>
    <img src="{{ asset('images/logosantaana_blanco.png') }}" alt="Imagen Derecha">
</div>
<body>

<div id="divcontenedor" style="display: none">
<div class="modal-body">
    <form id="formulario-nuevo" enctype="multipart/form-data">
        <div class="card-body">

            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">
                <div class="form-group-peque d-flex align-items-center">
                    <label class="me-2">Libro:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" style="width: 50%;" name="libro[]" >
                </div>

                <div class="form-group-peque d-flex align-items-center">
                    <label>Nicho:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" style="width: 50%;" name="nicho[]">
                </div>
            </div>

            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">

                <div class="form-group d-flex align-items-center">
                    <label>Nombre Primer fallecido: </label>
                    <input type="text" maxlength="300" autocomplete="off" class="form-control" style="width: 100%;" name="nombre[]">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de fallecimiento:</label>
                    <input type="date" maxlength="15" autocomplete="off" class="form-control" style="width: 50%;" name="fechafallecimiento[]">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de exhumacion:</label>
                    <input type="date" maxlength="15" autocomplete="off" class="form-control" style="width: 50%;" name="fechaexhumacion[]">
                </div>


            </div>

            <!-- Fila 2: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">

                <div class="form-group ">
                    <label>Fecha de vencimiento:</label>
                    <input type="date" maxlength="15" autocomplete="off" class="form-control" name="fechavencimiento[]">
                </div>
                <div class="form-group">
                    <label>Periodo de mora:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="periodo_en_mora[]">
                </div>
                <div class="form-group">
                    <label>Personas en mora:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="persona_en_mora[]">
                </div>
                <div class="form-group">
                    <label>Cancelacion sin el 5% x periodo:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="cancelacion_sin[]">
                </div>
                <div class="form-group">
                    <label>Prox fecha de vencimiento:</label>
                    <input type="date" maxlength="15" autocomplete="off" class="form-control" name="proxfecha[]">
                </div>
            </div>

            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">
                <div class="form-group">
                    <label>Contribuyente que cancela:</label>
                    <input type="text" maxlength="300" autocomplete="off" class="form-control" name="contrcancela[]">
                </div>
                <div class="form-group">
                    <label>DUI:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="dui[]">
                </div>
                <div class="form-group">
                    <label>Direccion:</label>
                    <input type="text" maxlength="300" autocomplete="off" class="form-control" name="direccion[]">
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="telefono[]">
                </div>
                <div class="form-group">
                    <label>Periodo cancelado:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="periodocancelado[]">
                </div>


            </div>

            <!-- Fila 3: Fecha de exhumación y Fecha de vencimiento -->
            <div class="fila">


                <div class="form-group">
                    <label>Costo sin el 5%:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="costosin[]">
                </div>
                <div class="form-group">
                    <label>Costo con el 5%:</label>
                    <input type="text" maxlength="10" autocomplete="off" class="form-control" name="costocon[]">
                </div>
                <div class="form-group">
                    <label>Recibo de ingreso(tesoreria):</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" name="recibo[]">
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso (tesoreria):</label>
                    <input type="date" maxlength="15" autocomplete="off" class="form-control" name="fechateso[]">
                </div>

            </div>




        </div>
    </form>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" style="font-weight: bold; background-color: #28a745; color: white !important;" class="button button-rounded button-pill button-small" onclick="nuevo();">
        Guardar
    </button>
</div>
</div>
</body>

</html>



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
                                    <div class="form-group">
                                        <label>Tipo de Usuario:</label>
                                        <select  id="select-usuarios-editar" class="form-control">

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nombre-editar">
                                    </div>

                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="text" maxlength="8" autocomplete="off" class="form-control" id="telefono-editar">
                                    </div>

                                    <div class="form-group">
                                        <label>Genero</label>
                                        <select  id="select-genero-editar" class="form-control">

                                            <option value="0" selected>Masculino</option>
                                            <option value="1">Femenino</option>S

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Subir archivo</label>
                                        <input type="file" class="form-control" id="archivo-editar" accept=".pdf,.docx,.jpg,.png">
                                    </div>



                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" style="font-weight: bold; background-color: #28a745; color: white !important;" class="button button-rounded button-pill button-small" onclick="editar()">Guardar</button>
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

                var ruta = "{{ URL::to('/admin/ejemplotabla/index') }}";
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


            function nuevo() {
                // Obtener todos los campos del formulario
                const libro = document.querySelector('input[name="libro[]"]').value;
                const nicho = document.querySelector('input[name="nicho[]"]').value;
                const nombre = document.querySelector('input[name="nombre[]"]').value;
                const fechaFallecimiento = document.querySelector('input[name="fechafallecimiento[]"]').value;
                const fechaExhumacion = document.querySelector('input[name="fechaexhumacion[]"]').value;
                const fechaVencimiento = document.querySelector('input[name="fechavencimiento[]"]').value;
                const periodoMora = document.querySelector('input[name="periodo_en_mora[]"]').value;
                const personasenMora = document.querySelector('input[name="persona_en_mora[]"]').value;
                const cancelacionSin = document.querySelector('input[name="cancelacion_sin[]"]').value;
                const proxFecha = document.querySelector('input[name="proxfecha[]"]').value;
                const contribuyente = document.querySelector('input[name="contrcancela[]"]').value; // Ajusta el nombre si es incorrecto
                const dui = document.querySelector('input[name="dui[]"]').value; // Ajusta el nombre si es incorrecto
                const direccion = document.querySelector('input[name="direccion[]"]').value; // Ajusta el nombre si es incorrecto
                const telefono = document.querySelector('input[name="telefono[]"]').value; // Ajusta el nombre si es incorrecto
                const periodoCancelado = document.querySelector('input[name="periodocancelado[]"]').value; // Ajusta el nombre si es incorrecto
                const costoSin = document.querySelector('input[name="costosin[]"]').value; // Ajusta el nombre si es incorrecto
                const costoCon = document.querySelector('input[name="costocon[]"]').value; // Ajusta el nombre si es incorrecto
                const reciboIngreso = document.querySelector('input[name="recibo[]"]').value; // Ajusta el nombre si es incorrecto
                const fechaIngreso = document.querySelector('input[name="fechateso[]"]').value; // Ajusta el nombre si es incorrecto

                // Validar campos obligatorios
                if (
                    libro === '' || nicho === '' || nombre === '' || fechaFallecimiento === '' ||
                    fechaExhumacion === '' || fechaVencimiento === '' || periodoMora === '' ||
                    cancelacionSin === '' || proxFecha === '' || contribuyente === '' || dui === '' ||
                    direccion === '' || telefono === '' || periodoCancelado === '' || costoSin === '' ||
                    costoCon === '' || reciboIngreso === '' || fechaIngreso === ''
                ) {
                    toastr.error('Todos los campos son requeridos');
                    return;
                }

                // Crear un objeto FormData para enviar los datos
                const formData = new FormData();
                formData.append('libro', libro);
                formData.append('nicho', nicho);
                formData.append('nombre', nombre);
                formData.append('fechaFallecimiento', fechaFallecimiento);
                formData.append('fechaExhumacion', fechaExhumacion);
                formData.append('fechaVencimiento', fechaVencimiento);
                formData.append('periodoMora', periodoMora);
                formData.append('personaMora', personasenMora);
                formData.append('cancelacionSin', cancelacionSin);
                formData.append('proxFecha', proxFecha);
                formData.append('contribuyente', contribuyente);
                formData.append('dui', dui);
                formData.append('direccion', direccion);
                formData.append('telefono', telefono);
                formData.append('periodoCancelado', periodoCancelado);
                formData.append('costoSin', costoSin);
                formData.append('costoCon', costoCon);
                formData.append('reciboIngreso', reciboIngreso);
                formData.append('fechaIngreso', fechaIngreso);

                // Mostrar el loading
                openLoading();

                // Enviar los datos al servidor usando
                axios.post(url + '/guardarlibro/index', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then((response) => {
                        // Cerrar el loading
                        closeLoading();

                        // Verificar la respuesta del servidor
                        if (response.data.success === 1) {
                            toastr.success('Registrado correctamente');
                            limpiarFormulario();
                            recargar(); // Recargar la página o la tabla
                        } else {
                            toastr.error('Error al registrar');
                        }
                    })
                    .catch((error) => {
                        // Cerrar el loading
                        closeLoading();

                        // Verificar si la respuesta del servidor contiene un mensaje específico
                        if (error.response) {
                            console.error('Error del servidor:', error.response.data);

                            if (error.response.status === 400 && error.response.data.message) {
                                // Si Laravel envió un mensaje de error, lo mostramos en el toast
                                toastr.error(error.response.data.message);
                            } else {
                                toastr.error('Error al registrar. Intente nuevamente.');
                            }
                        } else {
                            toastr.error('No se pudo conectar con el servidor.');
                        }
                    });
            }

                function informacion(id){
                openLoading();
                document.getElementById("formulario-editar").reset();

                axios.post(url+'/informacion/info-usuario',{
                    'id': id
                })
                    .then((response) => {
                        closeLoading();
                        if(response.data.success === 1){
                            $('#modalEditar').modal('show');
                            $('#id-editar').val(id);

                            // Limpia el select
                            document.getElementById("select-usuarios-editar").options.length = 0;

                            // Rellena el select con los usuarios
                            const usuarios = response.data.arrayusuarios || {};
                            const usuarioSeleccionado = response.data.usuario;

                            $.each(usuarios, function(key, val) {
                                const selected = (usuarioSeleccionado == key) ? 'selected="selected"' : '';
                                $('#select-usuarios-editar').append('<option value="' + key + '" ' + selected + '>' + val + '</option>');
                            });

                            $('#nombre-editar').val(response.data.info.nombre);
                            $('#telefono-editar').val(response.data.info.numero);



                        }else{
                            toastr.error('Información no encontrada');
                        }

                    })
                    .catch((error) => {
                        closeLoading();
                        toastr.error('Información no encontrada');
                    });
            }

            function editar() {
                // Obtén los valores del formulario
                var usuario = document.getElementById('select-usuarios-editar').value;
                var nombre = document.getElementById('nombre-editar').value;
                var telefono = document.getElementById('telefono-editar').value;
                var genero = document.getElementById('select-genero-editar').value;
                var id = document.getElementById('id-editar').value;
                var documento = document.getElementById('archivo-editar');

                // Validación básica
                if (nombre === '') {
                    toastr.error('Nombre es requerido');
                    return;
                }

                // Muestra el loader
                openLoading();

                // Crea el objeto FormData y agrega los datos
                var formData = new FormData();
                formData.append('id', id);
                formData.append('usuario', usuario);
                formData.append('nombre', nombre);
                formData.append('telefono', telefono);
                formData.append('genero', genero);
                formData.append('documento', documento.files[0]);

                // Envía la solicitud al backend
                axios.post(url + '/editarusuario/editar', formData)
                    .then((response) => {
                        console.log(response)
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

            {{--function exportarPDF() {--}}
            {{--    // Redirige a la ruta para generar el PDF--}}
            {{--    window.open("{{ route('generar.pdf') }}", "_blank");--}}
            {{--}--}}

            function descargarArchivo(id) {
                // URL de la ruta que apunta al controlador
                const url = `/proveedor/${id}/descargar`;

                // Redirige al usuario para descargar el archivo
                window.location.href = url;
            }


                let contadorFallecidos = 1;

                function agregarFallecido() {
                contadorFallecidos++;

                const nuevoFallecido = document.createElement("div");
                nuevoFallecido.classList.add("fallecido");
                nuevoFallecido.id = `fallecido-${contadorFallecidos}`;

                nuevoFallecido.innerHTML = `
                <hr>
                <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">

                <div class="form-group d-flex align-items-center">
                    <label>Nombre fallecido ${contadorFallecidos}</label>
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


            `;

                document.getElementById("campos-adicionales").appendChild(nuevoFallecido);
            }

            function limpiarFormulario() {
                document.querySelectorAll('input').forEach(input => {
                    input.value = ''; // Vaciar el campo
                });
            }




        </script>


@endsection
