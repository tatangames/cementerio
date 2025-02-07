@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet"
          xmlns="http://www.w3.org/1999/html"/>
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
        .colorback {
            background-color: #001f3f; /* Azul marino */
        }
        /* Estilos para centrar el header */
        .centrado {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            font-weight: bold; /* Título en negrita */
            color: #FFFFFF;
            margin-bottom: 10px;
        }

        .form-group-peque input {
            width: 12%;
            padding: 5px;
            font-size: 16px;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 150px;
            height: auto;
        }
        label{
            color: white;
        }
        .modallabel{
            color: black;
        }


    </style>
</head>
<body class="colorback">
<div class="centrado">
    <div class="header">
        <img src="{{ asset('images/alcal_metapan.png') }}" alt="Imagen Izquierda">
        <div class="title-container">
            <div class="centrado">DETALLES</div>
        </div>
        <img src="{{ asset('images/logosantaana_blanco.png') }}" alt="Imagen Derecha">
    </div>
</div>

<div class="modal-body">
    <form id="formulario-nuevo-fallecidos" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" id="id-editar-nuevo">
            <!-- Fila 1: Nombre y Fecha de fallecimiento -->
            <div class="fila">
                <div class="form-group-peque d-flex align-items-center" style="gap: 10px;">
                    <label >Libro:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="libro" readonly>



                    <label>Nicho:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nicho" readonly>
                </div>
            </div>


                {{--Fila 2--}}
            <div class="fila">

                <div class="form-group d-flex align-items-center">
                    <label>Nombre Primer fallecido</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nombreeditar" readonly>
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de fallecimiento:</label>
                    <input type="date" maxlength="50" autocomplete="off" class="date" id="fechafallecimiento" readonly>
                </div>
                <div class="form-group d-flex align-items-center">
                    <label>Fecha de exhumacion:</label>
                    <input type="date" maxlength="50" autocomplete="off" class="date" id="fechaexhumacion" readonly>
                </div>



            </div>
            <div id="listaFallecidos">
                <!-- Aquí se mostrarán los datos ingresados -->
            </div>

            <button type="button"  onclick="modalAgregar()">
                <i class="fas fa-pencil-alt"></i>
                Agregar fallecidos
            </button>

{{--            Fila 3--}}
            <div class="fila">

                <div class="form-group">
                    <label>Fecha de vencimiento:</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="fechavencimiento" readonly>
                </div>
                <div class="form-group">
                    <label>Periodo de mora:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="periodo_en_mora" readonly>
                </div>
                <div class="form-group">
                    <label>Personas en mora:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="persona_en_mora" readonly>
                </div>
                <div class="form-group">
                    <label>Cancelacion sin el 5% x periodo:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="cancelacion_sin" readonly>
                </div>
                <div class="form-group">
                    <label>Prox fecha de vencimiento:</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="proxfecha" readonly>
                </div>
            </div>


            <div class="fila">
                <div class="form-group">
                    <label>Contribuyente que cancela:</label>
                    <input type="text" maxlength="50" autocomplete="off" class="form-control" id="contrcancela" readonly>
                </div>
                <div class="form-group">
                    <label>DUI:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="dui" readonly>
                </div>
                <div class="form-group">
                    <label>Direccion:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="direccion" readonly>
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="telefono" readonly>
                </div>
                <div class="form-group">
                    <label>Periodo cancelado:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="periodocancelado" readonly>
                </div>

            </div>


            <div class="fila">

                <div class="form-group">
                    <label>Costo sin el 5%:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="costosin" readonly>
                </div>
                <div class="form-group">
                    <label>Costo con el 5%:</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="costocon" readonly>
                </div>
                <div class="form-group">
                    <label>Recibo de ingreso(tesoreria):</label>
                    <input type="text" maxlength="8" autocomplete="off" class="form-control" id="recibo" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso (tesoreria):</label>
                    <input type="date" maxlength="8" autocomplete="off" class="form-control" id="fechateso" readonly>
                </div>

                <div class="form-group">

                </div>

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
                                            <input type="hidden" id="id-editar">
                                        </div>

                                        <div class="form-group d-flex align-items-center">
                                            <label class="modallabel">Nombre fallecido</label>
                                            <input type="text" maxlength="50" autocomplete="off" class="form-control" id="nombreeditar2" >
                                        </div>
                                        <div class="form-group d-flex align-items-center">
                                            <label class="modallabel">Fecha de fallecimiento:</label>
                                            <input type="date" maxlength="50" autocomplete="off" class="date" id="fechafallecimiento-editar" >
                                        </div>
                                        <div class="form-group d-flex align-items-center">
                                            <label class="modallabel">Fecha de exhumacion:</label>
                                            <input type="date" maxlength="50" autocomplete="off" class="date" id="fechaexhumacion-editar" >
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

            </div>
            <button type="button" id="btnEditar" class="btn btn-primary">Editar</button>
            <button type="submit" id="btnGuardar" class="btn btn-success" onclick="guardar()" style="display: none; ">Guardar</button>


        </div>
    </form>
</div>
</body>
</html>



    @extends('backend.menus.footerjs')
    @section('archivos-js')

        <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>

        <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/alertaPersonalizada.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let urlParams = new URLSearchParams(window.location.search);
                let libroId = window.location.pathname.split('/').pop(); // Obtener el ID desde la URL

                if (libroId) {
                    cargarDatos(libroId); // Llamar a la función para cargar datos
                }
            });

            function cargarDatos(id) {
                axios.get("{{ url('/admin/informacion/info-usuario') }}/" + id)
                    .then((response) => {
                        if (response.data.success) {
                            let info = response.data.info;

                            // Asigna el id al campo oculto
                            document.getElementById('id-editar-nuevo').value = id;

                            // Llenar los campos con la información obtenida
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

                            // Aplicar el estilo a la fecha de vencimiento
                            aplicarEstiloFechaVencimiento();


                        } else {
                            toastr.error('No se encontró información para este libro');
                        }
                    })
                    .catch((error) => {
                        toastr.error('Error al cargar los datos del libro');
                    });
            }


                document.getElementById("btnEditar").addEventListener("click", function () {
                let inputs = document.querySelectorAll("input[readonly]");

                inputs.forEach(input => {
                input.removeAttribute("readonly"); // Habilita los campos
            });

                document.getElementById("btnEditar").style.display = "none";  // Oculta el botón Editar
                document.getElementById("btnGuardar").style.display = "inline-block"; // Muestra el botón Guardar
            });

            // guardar edicion

            function guardar() {
                // Obtén el valor del campo id
                const id = document.getElementById('id-editar-nuevo').value;

                // Verifica que el id esté presente
                if (!id) {
                    toastr.error('Error: El ID es requerido');
                    console.error('El campo id-editar no está presente o no tiene un valor.');
                    return;
                }

                // Obtén los valores de los campos modificados
                const libro = document.getElementById('libro').value;
                const nicho = document.getElementById('nicho').value;
                const nombre = document.getElementById('nombreeditar').value;
                const fechafallecimiento = document.getElementById('fechafallecimiento').value;
                const fechaexhumacion = document.getElementById('fechaexhumacion').value;
                const fechavencimiento = document.getElementById('fechavencimiento').value;
                const periodo_en_mora = document.getElementById('periodo_en_mora').value;
                const persona_en_mora = document.getElementById('persona_en_mora').value;
                const cancelacion_sin = document.getElementById('cancelacion_sin').value;
                const proxfecha = document.getElementById('proxfecha').value;
                const contrcancela = document.getElementById('contrcancela').value;
                const dui = document.getElementById('dui').value;
                const direccion = document.getElementById('direccion').value;
                const telefono = document.getElementById('telefono').value;
                const periodocancelado = document.getElementById('periodocancelado').value;
                const costosin = document.getElementById('costosin').value;
                const costocon = document.getElementById('costocon').value;
                const recibo = document.getElementById('recibo').value;
                const fechateso = document.getElementById('fechateso').value;
                const nombre_nuevo = document.getElementById('nombrefalle').value;
                const fechafallecimiento_nuevo = document.getElementById('fecha_falle').value;
                const fechaexhumacion_nuevo = document.getElementById('fecha_exhu').value;

                // Crea un objeto con los datos modificados
                const datosModificados = {
                    id,
                    libro,
                    nicho,
                    nombre,
                    fechafallecimiento,
                    fechaexhumacion,
                    fechavencimiento,
                    periodo_en_mora,
                    persona_en_mora,
                    cancelacion_sin,
                    proxfecha,
                    contrcancela,
                    dui,
                    direccion,
                    telefono,
                    periodocancelado,
                    costosin,
                    costocon,
                    recibo,
                    fechateso,
                    nombre_nuevo,
                    fechafallecimiento_nuevo,
                    fechaexhumacion_nuevo
                };


                console.log('Datos a enviar:', datosModificados);

                // Envía los datos al servidor
                axios.post(url + '/editarusuario/editar', datosModificados)
                    .then(response => {
                        if (response.data.success) {
                            toastr.success('Datos guardados correctamente');
                            // Opcional: Recargar la página o actualizar la interfaz
                            location.reload();
                        } else {
                            toastr.error('Error al guardar los datos');
                            console.error('Respuesta del servidor:', response.data);
                        }
                    })
                    .catch(error => {
                        console.error('Error al enviar los datos:', error);
                        toastr.error('Error al guardar los datos');
                    });
            }

            function modalAgregar(){

                $('#modalAgregar').modal({backdrop: 'static', keyboard: false})
            }



            function nuevo() {
                const idPrincipal = {{ $id }};

                // Capturar los datos del modal
                const nombre = document.getElementById('nombreeditar2').value;
                const fechaFallecimiento = document.getElementById('fechafallecimiento-editar').value;
                const fechaExhumacion = document.getElementById('fechaexhumacion-editar').value;

                // Validar que los campos no estén vacíos
                if (!nombre || !fechaFallecimiento) {
                    toastr.warning("Por favor, completa todos los campos obligatorios.");
                    return;
                }

                // Construir el objeto de datos
                const data = {
                    id_principal: idPrincipal,
                    Nombre: nombre,
                    fecha_fallecimiento: fechaFallecimiento,
                    fecha_exhumacion: fechaExhumacion
                };

                // Enviar los datos al backend con Axios
                axios.post("{{ url('/admin/informacion/guardar-fallecido') }}", data)
                    .then(response => {
                        if (response.data.success) {
                            toastr.success("Fallecido agregado correctamente");

                            // Cerrar el modal
                            $('#modalAgregar').modal('hide');

                            // Limpiar los campos del modal
                            document.getElementById('nombreeditar2').value = '';
                            document.getElementById('fechafallecimiento-editar').value = '';
                            document.getElementById('fechaexhumacion-editar').value = '';

                            // Agregar el nuevo bloque de datos
                            agregarFilaTabla(response.data.fallecido, true);
                        } else {
                            toastr.error("Error al guardar los datos");
                        }
                    })
                    .catch(error => {
                        toastr.error("Error en la petición");
                        console.error(error);
                    });
            }

            function agregarFilaTabla(fallecido, esUltimo) {
                let listaFallecidos = document.querySelector("#listaFallecidos");
                if (!listaFallecidos) {
                    console.error("No se encontró el contenedor con ID 'listaFallecidos'.");
                    return;
                }

                let bloque = document.createElement("div");
                bloque.className = "fila";
                bloque.innerHTML = `
                        <div class="form-group d-flex align-items-center">
                            <label>${esUltimo ? 'Último fallecido:' : 'Nombre:'}</label>

                            <input  id="nombrefalle" type="text" value="${fallecido.nombre}" readonly class="form-control">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <label>Fecha de fallecimiento:</label>
                            <input id="fecha_falle" type="date" value="${fallecido.fecha_de_fallecimiento}" readonly class="form-control">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <label>Fecha de exhumación:</label>
                            <input id="fecha_exhu" type="date" value="${fallecido.fecha_de_exhumacion || ''}" readonly class="form-control">
                        </div>
    `;

                listaFallecidos.appendChild(bloque);
            }

            document.addEventListener('DOMContentLoaded', function () {
                const idRegistro = {{ $id }}; // Asegúrate de que $id esté definido en tu vista
                cargarFallecidos(idRegistro);
            });

            function cargarFallecidos(idRegistro) {
                axios.get(`/admin/informacion/obtener-fallecidos/${idRegistro}`)
                    .then(response => {
                        console.log("Respuesta del servidor:", response.data);
                        if (response.data.success) {
                            // Limpiar la lista actual
                            document.getElementById('listaFallecidos').innerHTML = '';

                            // Mostrar cada fallecido en la lista
                            response.data.fallecidos.forEach((fallecido, index) => {
                                const esUltimo = index === response.data.fallecidos.length - 1; // Verificar si es el último
                                agregarFilaTabla(fallecido, esUltimo);
                            });
                        } else {
                            toastr.error("Error al cargar los fallecidos");
                        }
                    })
                    .catch(error => {
                        toastr.error("Error en la petición");
                        console.error(error);
                    });
            }



            // Función para convertir fecha de DD-MM-YYYY a YYYY-MM-DD
            function convertirFechaFormato(fechaDDMMYYYY) {
                const [dia, mes, anio] = fechaDDMMYYYY.split('-');
                return `${anio}-${mes}-${dia}`;
            }

            // Función para aplicar el estilo según la fecha de vencimiento
            function aplicarEstiloFechaVencimiento() {
                const inputFechaVencimiento = document.getElementById('fechavencimiento');
                if (!inputFechaVencimiento) {
                    console.error("No se encontró el input de fecha de vencimiento.");
                    return;
                }

                if (!inputFechaVencimiento.value) {
                    console.error("El input de fecha de vencimiento está vacío.");
                    return;
                }

                const fechaVencimiento = new Date(inputFechaVencimiento.value);
                if (isNaN(fechaVencimiento.getTime())) {
                    console.error("La fecha de vencimiento no es válida.");
                    return;
                }

                const fechaActual = new Date();

                if (fechaVencimiento < fechaActual) {
                    inputFechaVencimiento.style.backgroundColor = '#ffcccc'; // Rojo
                } else if (fechaVencimiento.getFullYear() === fechaActual.getFullYear()) {
                    inputFechaVencimiento.style.backgroundColor = '#ffcc99'; // Naranja
                } else {
                    inputFechaVencimiento.style.backgroundColor = '#ccffcc'; // Verde
                }
            }

            // Ejemplo: Fecha en formato DD-MM-YYYY
            const fechaDDMMYYYY = "31-12-2023";

            // Convertir la fecha a YYYY-MM-DD
            const fechaYYYYMMDD = convertirFechaFormato(fechaDDMMYYYY);

            // Asignar la fecha al input
            document.getElementById('fechavencimiento').value = fechaYYYYMMDD;

            // Aplicar el estilo
            aplicarEstiloFechaVencimiento();

            // Llamar a la función al cargar la página
            document.addEventListener('DOMContentLoaded', function () {
                aplicarEstiloFechaVencimiento();
            });

            // Llamar a la función cuando cambia la fecha
            document.getElementById('fechavencimiento').addEventListener('change', function () {
                aplicarEstiloFechaVencimiento();
            });




        </script>



@endsection
