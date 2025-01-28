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

    <section class="content-header">
        <div class="container-fluid">
            <button type="button" style="font-weight: bold; background-color: #28a745; color: white !important;" onclick="modalAgregar()" class="button button-3d button-rounded button-pill button-small">
                <i class="fas fa-pencil-alt"></i>
                Nuevo Proveedor
            </button>

            <button type="button"
                    style="font-weight: bold; background-color: #28a745; color: white !important;"
                    onclick="exportarPDF()"
                    class="button button-3d button-rounded button-pill button-small">
                <i class="fas fa-file-pdf"></i>
                Exportar PDF
            </button>


        </div>

    </section>

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

    <div class="modal fade" id="modalAgregar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulario-nuevo" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group">
                                <label>Usuarios:</label>
                                <select id="select-usuarios" class="form-control">
{{--                                    <!--@foreach($arrayusuarios as $item)--}}
{{--                                        <option value="{{$item->id}}">{{ $item->nombre }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nombre-nuevo">
                            </div>

                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" maxlength="8" autocomplete="off" class="form-control" id="telefono-nuevo">
                            </div>

                            <div class="form-group">
                                <label>Género</label>
                                <select id="select-genero" class="form-control">
                                    <option value="0" selected>Masculino</option>
                                    <option value="1">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subir archivo</label>
                                <input type="file" class="form-control" id="archivo-nuevo" accept=".pdf,.docx,.jpg,.png">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button
                        type="button"
                        style="font-weight: bold; background-color: #28a745; color: white !important;"
                        class="button button-rounded button-pill button-small"
                        onclick="nuevo();">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>


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


            function nuevo(){
                var usuario = document.getElementById('select-usuarios').value;
                var nombre = document.getElementById('nombre-nuevo').value;
                var telefono = document.getElementById('telefono-nuevo').value;
                var genero = document.getElementById('select-genero').value;
                var documento = document.getElementById('archivo-nuevo');




                if(nombre === ''){
                    toastr.error('Nombre es requerido');
                    return;
                }

                openLoading();
                var formData = new FormData();
                formData.append('usuario', usuario);
                formData.append('nombre', nombre);
                formData.append('genero', genero)
                formData.append('telefono', telefono)
                formData.append('documento', documento.files[0]);


                axios.post(url+'/ejemploguardar/index', formData, {
                })
                    .then((response) => {
                        closeLoading();
                        if(response.data.success === 1){
                            toastr.success('Registrado correctamente');
                            $('#modalAgregar').modal('hide');
                            recargar();
                        }
                        else {
                            toastr.error('Error al registrar');
                        }
                    })
                    .catch((error) => {
                        toastr.error('Error al registrar');
                        closeLoading();
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










            // //Mostrar subida de archivo
            // $(document).ready(function() {
            //     // Cuando el usuario selecciona un archivo
            //     $('#file').change(function() {
            //         // Obtener el nombre del archivo seleccionado
            //         var fileName = $(this).val().split('\\').pop(); // Obtener solo el nombre (sin ruta)
            //         // Mostrar el nombre del archivo en el contenedor
            //         $('#file-name-display').text('Archivo seleccionado: ' + fileName);
            //     });
            //
            //     // Llamada a la función cuando el formulario es enviado
            //     $('#uploadForm').on('submit', function(event) {
            //         event.preventDefault(); // Evita el envío tradicional del formulario
            //         subirArchivo(); // Llama a la función para manejar el archivo
            //     });
            // });
            //
            // // Función que maneja la subida del archivo
            // function subirArchivo() {
            //     var formData = new FormData($('#uploadForm')[0]); // Obtenemos los datos del formulario
            //
            //     $.ajax({
            //         url: $('#uploadForm').attr('action'), // URL del formulario (ruta para subir el archivo)
            //         type: 'POST',
            //         data: formData,
            //         contentType: false, // No establecer el tipo de contenido
            //         processData: false, // No procesar los datos
            //         success: function(response) {
            //             // Si la respuesta es exitosa, recargamos la tabla
            //             if (response.success) {
            //                 toastr.success(response.message); // Muestra el mensaje de éxito
            //                 recargar(); // Llama a la función para recargar la tabla
            //
            //                 // Limpiar el nombre del archivo y el campo de archivo
            //                 $('#file').val(''); // Resetea el campo del archivo
            //                 $('#file-name-display').text(''); // Limpia el nombre del archivo mostrado
            //             } else {
            //                 toastr.error('Hubo un problema al subir el archivo.'); // Muestra el mensaje de error
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             toastr.error('Hubo un error con la solicitud.'); // Muestra un mensaje si hay un error
            //         }
            //     });
            // }







        </script>


@endsection
