<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 14%">Libro</th>
                                <th style="width: 8%">Nicho</th>
                                <th style="width: 14%">Nombre</th>
                                <th style="width: 14%">Fecha de fallecimiento</th>
                                <th style="width: 10%">Fecha de vencimiento</th>
                                <th style="width: 10%">Periodo de mora</th>
                                <th style="width: 10%">Personas en mora</th>
                                <th style="width: 10%">Cancelación sin el 5%</th>
                                <th style="width: 10%">Próxima fecha de vencimiento</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arraylibros->take(10) as $dato) {{-- Solo muestra los primeros 10 registros --}}
                            <tr>
                                <td>{{ $dato->libro }}</td>
                                <td>{{ $dato->nicho }}</td>
                                <td class="nombre">{{ $dato->nombre }}</td>
                                <td>{{ $dato->fecha_fallecimiento }}</td>
                                <td>{{ $dato->fecha_vencimiento }}</td>
                                <td>{{ $dato->periodo_mora }}</td>
                                <td>{{ $dato->personas_mora }}</td>
                                <td>{{ $dato->cancelacion_sin_descuento }}</td>
                                <td>{{ $dato->proxima_fecha_vencimiento }}</td>
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
