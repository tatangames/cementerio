<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5%">Libro</th>
                                <th style="width: 5%">Nicho</th>
                                <th style="width: 14%">Nombre</th>
                                <th style="width: 14%">Fecha de fallecimiento</th>
                                <th style="width: 10%">Fecha de vencimiento</th>
                                <th style="width: 10%">Periodo de mora</th>
                                <th style="width: 10%">Personas en mora</th>
                                <th style="width: 10%"> Opciones</th>
{{--                                <th style="width: 10%">Cancelación sin el 5%</th>--}}
{{--                                <th style="width: 10%">Próxima fecha de vencimiento</th>--}}
{{--                                <th style="width: 10%">Contribuyente</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arraylibros as $dato) {{-- Solo muestra los primeros 10 registros --}}

                                <tr>
                                    <td>{{ $dato->libro }}</td>
                                    <td>{{ $dato->numero_de_nicho }}</td> {{-- Asegúrate que coincida --}}
                                    <td>{{ $dato->nombre }}</td>
                                    <td>{{ $dato->fecha_de_fallecimiento }}</td>
                                    <td>{{ $dato->fecha_de_vencimiento }}</td>
                                    <td>{{ $dato->periodo_de_mora }}</td>
                                    <td>{{ $dato->personas_en_mora }}</td>
{{--                                    <td>{{ $dato->cancelacion_sin_5 }}</td>--}}
{{--                                    <td>{{ $dato->prox_fecha_venc }}</td>--}}

                                    <td class="d-flex align-items-center gap-2">
                                        <button type="button"
                                                class="btn btn-primary button-rounded button-pill btn-sm"
                                                onclick="informacion({{ $dato->id }})">
                                            <i class="fas fa-edit" title="Editar"></i>&nbsp; Editar
                                        </button>

                                        <button type="button"
                                                class="btn btn-danger button-rounded button-pill btn-sm"
                                                onclick="modalBorrarUser({{ $dato->id }})">
                                            <i class="fas fa-trash-alt" title="Borrar"></i>&nbsp; Eliminar
                                        </button>

                                        @if($dato->documento_url)
                                            <button type="button"
                                                    class="btn btn-primary btn-rounded btn-sm d-flex align-items-center"
                                                    onclick="descargarArchivo({{ $dato->id }})">
                                                <i class="fas fa-download" title="Descargar"></i>&nbsp; Descargar Archivo
                                            </button>
                                        @endif

                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(function () {
        $("#tabla").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100, 150, -1], [10, 25, 50, 100, 150, "Todo"]],
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
        });
    });

</script>
