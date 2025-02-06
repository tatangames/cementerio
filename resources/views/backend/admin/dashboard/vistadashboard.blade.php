
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Agregar Bootstrap 5 desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        table {
            /*Ajustar tablas*/
            table-layout: fixed;
        }

        .cursor-pointer:hover {
            cursor: pointer;
            color: #401fd2;
            font-weight: bold;
        }

        *:focus {
            outline: none;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #001f3f; /* Azul marino */
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

        /*.search-container {*/
        /*    margin: 20px 0;*/
        /*}*/

        /*.search-container input[type="text"] {*/

        /*    width: 70%;*/
        /*    max-width: 600px;*/
        /*    padding: 10px;*/
        /*    font-size: 1rem;*/
        /*    border: 2px solid #FFFFFF;*/
        /*    border-radius: 5px;*/
        /*    background-color: transparent;*/
        /*    color: #FFFFFF;*/
        /*}*/

        /*.search-container input[type="text"]::placeholder {*/
        /*    color: #CCCCCC; !* Color placeholder *!*/
        /*}*/

        /*.search-container button {*/
        /*    padding: 10px 20px;*/
        /*    font-size: 1rem;*/
        /*    font-weight: bold;*/
        /*    color: #FFFFFF;*/
        /*    background-color: #007BFF; !* Botón azul *!*/
        /*    border: none;*/
        /*    border-radius: 5px;*/
        /*    cursor: pointer;*/
        /*}*/

        /*.search-container button:hover {*/
        /*    background-color: #0056b3; !* Azul más oscuro *!*/
        /*}*/

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

        /*.droplista {*/
        /*    position: absolute;*/
        /*    z-index: 15;*/
        /*    width: 100%;  !* Hace que la lista sea del mismo ancho que el input *!*/
        /*    display: none;*/

        /*}*/




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


{{--        <div class="search-container">--}}
{{--            <input type="text" placeholder="Buscar aquí...">--}}
{{--            <button type="button">Buscar</button>--}}
{{--        </div>--}}







        <section class="content" style="margin-top: 15px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="form-group col-md-6">
                        <table class="table" id="matriz-busqueda" data-toggle="table">
                            <tbody>
                            <tr>
                                <td>
                                    <input id="inputBuscador" data-idfallecido='0' autocomplete="off"
                                           class= 'form-control' style='width:100%; background-color: #003366; color: #FFFFFF'
                                           onkeyup='buscarFallecido(this)' maxlength='300' type='text'>
                                    <div class='droplista' id="midropmenu"
                                         style='position: absolute; z-index: 15;
                                         width: 100%; display: none; '></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>




</body>
</html>







@extends('backend.menus.footerjs')

@section('archivos-js')

    <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">


        $(document).ready(function () {

            window.seguroBuscador = true;
            window.txtContenedorGlobal = this;

            $(document).click(function(){
                $(".droplista").hide();
            });

            $(document).ready(function() {
                $('[data-toggle="popover"]').popover({
                    placement: 'top',
                    trigger: 'hover'
                });
            });

            document.getElementById("divcontenedor").style.display = "block";
        });


        function buscarFallecido(e){

            // seguro para evitar errores de busqueda continua
            if(seguroBuscador){
                seguroBuscador = false;

                var row = $(e).closest('tr');
                txtContenedorGlobal = e;

                let texto = e.value;

                if(texto === ''){
                    // si se limpia el input, setear el atributo id
                    $(e).attr('data-idfallecido', 0);
                }

                axios.post('/admin/buscar/fallecido', {
                    'query' : texto
                })
                    .then((response) => {

                        seguroBuscador = true;
                        $(row).each(function (index, element) {
                            $(this).find(".droplista").fadeIn();
                            $(this).find(".droplista").html(response.data);
                        });
                    })
                    .catch((error) => {
                        seguroBuscador = true;
                    });
            }
        }


        function modificarValor(edrop){

            // obtener texto del li
            let texto = $(edrop).text();
            // setear el input de la descripcion
            $(txtContenedorGlobal).val('');

            window.location.href="{{ url('/admin/libros/detalle') }}/" + edrop.id;

            // agregar el id al atributo del input descripcion
            // $(txtContenedorGlobal).attr('data-idfallecido', edrop.id);

            document.activeElement.blur();
        }
    </script>
@endsection
