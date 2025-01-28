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
</body>
</html>


