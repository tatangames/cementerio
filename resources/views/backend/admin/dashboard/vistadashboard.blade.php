<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #001f3f;
            color: #000; /* Texto negro */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .welcome-container {
            width: 100%;
            max-width: 1200px;
            text-align: center;
            margin-top: 20px;
            padding: 20px;
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

        .title-container {
            margin: 10px 0;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold; /* Título en negrita */
            color: #FFFFFF;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 1.6rem;
            font-style: italic; /* Subtítulo en cursiva */
            color: #FFFFFF; /* Un tono gris oscuro para contraste */
        }

        .search-container {
            margin: 20px 0;
        }

        .search-container input[type="text"] {
            width: 70%;
            max-width: 600px;
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #FFFFFF;
            border-radius: 5px;
            background-color: transparent;
            color: #FFFFFF;
        }

        .search-container input[type="text"]::placeholder {
            color: #CCCCCC; /* Color placeholder */
        }

        .search-container button {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #FFFFFF;
            background-color: #007BFF; /* Botón azul */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3; /* Azul más oscuro */
        }

        @media (max-width: 768px) {
            .header img {
                width: 120px;
            }

            .title {
                font-size: 1.8rem;
            }

            .subtitle {
                font-size: 1.0rem;
            }
        }
    </style>
</head>
<body>
<div id="divcontenedor" style="display: none">
<div class="welcome-container">

    <!-- Cabecera con imágenes y título centrado -->
    <div class="header">
        <img src="{{ asset('images/alcal_metapan.png') }}" alt="Imagen Izquierda">
        <div class="title-container">
            <div class="title">Indice de refrendas de Nichos Municipales</div>
            <div class="subtitle">Cementerio General de Metapán "El Socorro"</div>
        </div>
        <img src="{{ asset('images/logosantaana_blanco.png') }}" alt="Imagen Derecha">
    </div>


    <div class="search-container">
        <input type="text" placeholder="Buscar aquí...">
        <button type="button">Buscar</button>
    </div>



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
<script type="text/javascript">
    $(document).ready(function(){

        var ruta = "{{ URL::to('/admin/libro1tabla/index') }}";
        $('#tablaDatatable').load(ruta);
        if (status == "error") {
            console.log("Error cargando la tabla: " + xhr.status + " " + xhr.statusText);
        } else {
            console.log("Tabla cargada correctamente.");
            document.getElementById("divcontenedor").style.display = "block"; // Hacer visible el contenedor
        }

    });
</script>

@endsection
