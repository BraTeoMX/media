@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content') 

<div class="content">
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
            <h2 id="texto-escritura" class="estilo-mensaje fade-inH2">Centro de Desarrollo Habilidades Intimark</h2>
            <hr>
            <br>
            <div class="row">
                {{-- Iterar sobre las categorías --}}
                @php
                        $colores = [
                            '#1A237E', // Azul oscuro, azul marino
                            '#6A1B9A', // Púrpura más vibrante
                            '#1B5E20', // Verde bosque
                            '#4E342E', // Marrón oscuro
                            '#FF6F00', // Naranja brillante
                            '#4A148C', // Púrpura oscuro
                            '#880E4F', // Marrón muy oscuro, casi negro
                            '#01579B', // Azul más oscuro, azul medianoche
                            '#004D40', // Verde azulado oscuro, color petróleo
                            '#BF360C', // Rojo anaranjado oscuro, terracota
                            '#0D47A1', // Borgoña o vino oscuro
                            '#006064', // Cian oscuro, azul verdoso
                            '#F57F17', // Naranja amarillento, calabaza
                            '#263238', // Gris azulado muy oscuro, casi negro
                            '#2E7D32', // Verde esmeralda
                            '#D84315', // Naranja quemado
                            '#9E9D24', // Verde amarillento, como oliva clara
                            '#827717', // Verde oliva oscuro
                            '#6A1B9A', // Verde oliva oscuro
                            '#3E2723'  // Azul cobalto, azul intenso y brillante
                        ];

                        $index = 0;
                        $coloresTitulo = [
                            '#303F9F', // Azul claro, no tan oscuro
                            '#8E24AA', // Púrpura más claro
                            '#388E3C', // Verde más claro
                            '#6D4C41', // Marrón claro
                            '#FFA000', // Naranja claro
                            '#7B1FA2', // Púrpura claro
                            '#BC477B', // Marrón claro, no tan oscuro
                            '#0277BD', // Azul claro, no tan oscuro
                            '#00695C', // Verde azulado claro, no tan oscuro
                            '#D84315', // Rojo anaranjado claro, no tan oscuro
                            '#1565C0', // Borgoña o vino claro, no tan oscuro
                            '#00838F', // Cian claro, no tan oscuro
                            '#FFB300', // Naranja amarillento claro
                            '#455A64', // Gris azulado claro, no tan oscuro
                            '#388E3C', // Verde esmeralda claro
                            '#EF6C00', // Naranja quemado claro
                            '#AFB42B', // Verde amarillento claro, no tan oscuro
                            '#9E9D24', // Verde oliva claro
                            '#827717', // Verde oliva claro, no tan oscuro
                            '#8E24AA', // Azul cobalto claro, no tan oscuro
                        ];
                        $indexTitulo = 0;
                @endphp
                @foreach($categorias as $categoria)
                @php
                    $color = $colores[$index % count($colores)];
                    $index++;
                    $colorTitulo = $coloresTitulo[$indexTitulo % count($coloresTitulo)];
                    $indexTitulo++;
                @endphp
                <div class="col-lg-3 col-md-6 col-sm-12 fade-in">
                    <div class="card text-center h-100 shadow" style="border: 50px solid {{ $color }}; background-color: white;">
                        <div class="card-body d-flex flex-column card-text-white" style="color: {{ $color }};">
                            <h5 class="card-title" style="color: {{ $color }};">{{ $categoria->nombre }}</h5>
                            <p class="card-text" style="color: {{ $color }};">Descripción o más detalles de la categoría</p>
                            <button type="button" class="btn btn-personalizado mt-auto" data-bs-toggle="modal" data-bs-target="#categoriaModal-{{ $categoria->id }}">Administrar</button>
                        </div>
                    </div>
                </div>
            
                <!-- Modal para cada categoría -->
                <div class="modal fade main-modal modal-scrollable" id="categoriaModal-{{ $categoria->id }}" tabindex="-1" aria-labelledby="categoriaLabel-{{ $categoria->id }}" aria-hidden="true" style="overflow-y: auto;">
                    <div class="modal-dialog modal-fullscreen-custom" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="categoriaLabel-{{ $categoria->id }}" style="color: {{ $color }};">{{ $categoria->nombre }}</h3>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Cerrar">
                                    CERRAR
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Primera columna -->
                                    <div class="col-md-6">
                                        <div class="accordion" id="accordionCategoria-{{ $categoria->id }}">
                                            @foreach($categoria->subcategorias as $subcategoria)
                                                <div class="card custom-card">
                                                    <div class="card-header custom-card-header" id="headingSubcategoria{{ $subcategoria->id }}" style="background-color: {{ $color }}">
                                                        <h2 class="mb-0">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSubcategoria{{ $subcategoria->id }}" aria-expanded="false" aria-controls="collapseSubcategoria{{ $subcategoria->id }}">
                                                                {{ $subcategoria->nombre }}
                                                              </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseSubcategoria{{ $subcategoria->id }}" class="accordion-collapse collapse" aria-labelledby="headingSubcategoria{{ $subcategoria->id }}" data-bs-parent="#accordionCategoria-{{ $categoria->id }}">
                                                        <div class="card-body" style="margin-left: 20px;">
                                                            <!-- Información de la Subcategoría -->
                                                            <div class="subcategoria-info">
                                                                @foreach($subcategoria->videos as $video)
                                                                    <div class="accordion" id="accordionVideo-{{ $video->id }}">
                                                                        <div class="card custom-card">
                                                                            <div class="card-header custom-card-header" id="headingVideo{{ $video->id }}" style="background-color: {{ $colorTitulo }}">
                                                                                <h2 class="mb-0">
                                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideo{{ $video->id }}" aria-expanded="false" aria-controls="collapseVideo{{ $video->id }}">
                                                                                        {{ $video->titulo }}
                                                                                    </button>
                                                                                </h2>
                                                                            </div>
                                                                            <div id="collapseVideo{{ $video->id }}" class="accordion-collapse collapse" aria-labelledby="headingVideo{{ $video->id }}" data-bs-parent="#accordionVideo-{{ $video->id }}">
                                                                                <div class="accordion-body">
                                                                                    <p>{!! nl2br(e($video->descripcion)) !!}</p>
                                                                                    <button type="button" class="btn btn-danger" onclick="showVideo('{{ Storage::url($video->link) }}')">
                                                                                        Ver Video
                                                                                    </button>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
            
                                    <!-- Segunda columna para el video y la descripción -->
                                    <div class="col-md-6" id="videoColumn-{{ $categoria->id }}">
                                        <div class="video-container">
                                            <!-- Contenido de la columna de videos y descripción -->
                                        </div>
                                        <br>              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fin del modal --}}
            @endforeach
                



            </div>
        </div>
    </div>
</div>

<script>
    function showVideo(videoPath) {
        var currentModal = document.querySelector('.modal.show');
        var categoryId = currentModal.id.split('-')[1];
        var videoContainer = document.getElementById('videoColumn-' + categoryId);

        // Limpiar la columna de videos antes de agregar nuevos elementos
        while (videoContainer.firstChild) {
            videoContainer.removeChild(videoContainer.firstChild);
        }

        var video = document.createElement('video');
        video.setAttribute('width', '100%');
        video.setAttribute('controls', '');

        var source = document.createElement('source');
        source.setAttribute('src', '/stream/' + videoPath.replace('/storage/', '')); // Aquí se actualiza la ruta
        source.setAttribute('type', 'video/mp4');

        video.appendChild(source);
        videoContainer.appendChild(video);
    }



</script>
    
  <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px); /* Puedes ajustar este valor si lo necesitas */
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    .fade-in {
        margin-bottom: 20px; /* Ajusta este valor según tus necesidades */
        animation: fadeIn 2s ease-out forwards;
    }
    .fade-inH2 {
        margin-bottom: 30px; /* Ajusta este valor según tus necesidades */
        animation: fadeIn 3s ease-out forwards;
    }

    @media (max-width: 768px) { /* Para dispositivos móviles */
        .fade-in {
            margin-bottom: 10px; /* Un margen más pequeño en dispositivos móviles */
        }
    }



    .card-bodyD {
        white-space: pre-line; /* Esto respetará los saltos de línea y espacios en blanco */
        line-height: 1.5; 
    }

    .video-container {
        margin-top: 15px;
        max-width: 640px; /* Ajusta el ancho máximo según tus necesidades */
        max-height: 360px; /* Ajusta la altura máxima según tus necesidades */
        margin-left: auto;
        margin-right: auto;
        overflow: hidden; /* Esto asegura que el video no sobrepase los límites del contenedor */
    }

    .video-container video {
        width: 100%; /* Hace que el video se ajuste al ancho del contenedor */
        height: auto; /* Mantiene la proporción del video */
    }
    
    /*estilos y diseños para el modal*/
    .modal-fullscreen-custom {
        width: 100%;
        height: 100vh; /* Asegúrate de que el modal no sea más alto que la ventana del navegador */
        max-width: none;
        margin: 0;
        overflow: hidden; /* Evita el desplazamiento en el nivel del modal */
    }

    .modal-fullscreen-custom .modal-content {
        height: 100%; /* El contenido del modal también ocupa toda la altura */

    }

    .modal-body {
        overflow-y: auto; /* Habilitar desplazamiento vertical solo en modal-body */
        max-height: calc(100vh - 120px); /* Altura máxima ajustada para permitir la barra de título y algo de margen */
    }

    .modal-scrollable {
        overflow-y: auto; /* Cambiar a auto para mejor manejo del scroll */
        max-height: 100vh;
    }


    .card {
        transition: transform 0.3s ease-in-out;
        margin-bottom: 100px; 
    }
    
    @media (max-width: 768px) { /* Para dispositivos móviles */
        .card {
            margin-bottom: 10px; /* Un margen más pequeño en dispositivos móviles */
        }
    }

    .card:hover {
        transform: translateY(-20px); /* eleva la tarjeta un poco cuando el usuario pasa el ratón por encima */
    }


    /* En tu archivo CSS */
    .card-background-1 {
        background-color: #f8f9fa; /* Color claro */
    }
    .card-background-2 {
        background-color: #6c757d; /* Color oscuro */
    }
    /* ... más clases para diferentes colores de fondo ... */

    .card-text-white h5,
    .card-text-white p {
        color: #ffffff;
    }

    .card-title {
        font-size: 30px; /* Ajusta este valor según tus necesidades */
        font-weight: bold;
    }

    .card-text {
        font-size: 18px; /* Ajusta este valor según tus necesidades */
        font-weight: bold;
    }

    .card-body .btn-primary, 
    .card-body .btn-secondary {
        padding: 20px 20px; /* Aumenta el padding para hacer el botón más grande */
        font-size: 25px; /* Ajusta el tamaño del texto dentro del botón */
    }

    .estilo-mensaje {
        text-align: center;
        font-weight: bold;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 50px;
    }

    .modal-title{
        margin: auto;
        font-weight: bold;
    }



    /*Propiedades del boton  */
    /* Agrega esto a tu archivo de estilos CSS */
    .btn-personalizado {
        background-color: #463C3C; /* Color naranja brillante similar al de las tarjetas */
        color: #FFFFFF; /* Color del texto en blanco para contrastar con el fondo */
        border: 1px solid #463C3C; /* Borde con el mismo color que el fondo */
        transition: background-color 0.3s ease; /* Efecto de transición suave */
        font-size: 16px; /* Tamaño del texto ajustado según tus preferencias */
    }
    .btn-personalizado:hover {
        background-color: #635858; /* Color ligeramente más oscuro al pasar el mouse */
    }

  </style>

<style>
    /* Estilos para el acordeón */
    .custom-card .card-header {
        padding: 5px 15px; /* Reduce el relleno del encabezado del acordeón */

    }

    .custom-card .card-body {
        padding: 10px; /* Reduce el relleno del cuerpo del acordeón */
    }

    .custom-card {
        margin-bottom: 5px; /* Reduce el margen entre elementos del acordeón */
    }

    /* Ajustar el efecto de hover para los acordeones */
    .custom-card:hover {
        transform: translateY(-5px); /* Reduce la cantidad de desplazamiento */
    }
    

</style>

<style>
    .accordion-button {
    background-color: inherit; /* Hace que el botón tome el color de fondo de su contenedor padre */
    color: #FFFFFF;
}

.accordion-button:not(.collapsed) {
    background-color: inherit !important; /* Mantiene el color incluso cuando el acordeón está expandido */
    /* Otros estilos que quieras mantener o cambiar cuando el acordeón está expandido */
}

</style>


        

@endsection


