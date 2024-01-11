@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat&family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">

@section('content')
<h2 id="texto-escritura" class="estilo-mensaje"></h2>
<div class="content">
  <div class="container-fluid">
    <div class="card-header card-header-info card-header-icon">
      <div class="accordion" id="accordionExample">

        @foreach($subcategorias as $subcategoria)
          <div class="card custom-card">
            <!-- Encabezado de la Subcategoría -->
            <div class="card-header custom-card-header" id="headingSubcategoria{{ $subcategoria->id }}">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSubcategoria{{ $subcategoria->id }}" aria-expanded="true" aria-controls="collapseSubcategoria{{ $subcategoria->id }}" style="color: #ffffff !important;">
                  {{ $subcategoria->nombre }}
                </button>
              </h2>
            </div>

            <!-- Contenido del Acordeón de la Subcategoría -->
            <div id="collapseSubcategoria{{ $subcategoria->id }}" class="collapse" aria-labelledby="headingSubcategoria{{ $subcategoria->id }}" data-parent="#accordionExample">
              <div class="card-body">
                @foreach($subcategoria->videos as $video)
                  <div class="card custom-card">
                    <!-- Encabezado del Video -->
                    <div class="card-header custom-card-header" id="headingVideo{{ $video->id }}">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVideo{{ $video->id }}" aria-expanded="true" aria-controls="collapseVideo{{ $video->id }}" style="color: #ffffff !important;">
                          {{ $video->titulo }}
                        </button>
                      </h2>
                    </div>

                    <!-- Contenido del Video -->
                    <div id="collapseVideo{{ $video->id }}" class="collapse" aria-labelledby="headingVideo{{ $video->id }}" data-parent="#collapseSubcategoria{{ $subcategoria->id }}">
                      <div class="card-body">
                        {{ $video->descripcion }}
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#videoModal{{ $video->id }}">
                          Ver Video
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="videoModal{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{ $video->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel{{ $video->id }}">{{ $video->titulo }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <video width="100%" controls>
                                  <source src="{{ Storage::url($video->link) }}" type="video/mp4">
                                  Tu navegador no admite la etiqueta de video.
                                </video>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</div>

<style>
  .accordion .card .custom-card-header {
      background-color: #2c6975; /* Color de fondo de la cabecera */
      color: #ffffff; /* Color del texto de la cabecera */
  } 
  .custom-card {
    box-shadow: 0 4px 8px 0 #2c6975; /* Ejemplo de sombra difuminada */
    border: 1px solid #ddd; /* Opcional: añade un borde ligero */
    margin-bottom: 10px; /* Espacio entre los elementos del acordeón */
}


  .estilo-mensaje {
        text-align: center;
        font-weight: bold;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Estilos nuevos para los acordeones */
    .accordion .card-header button {
        font-family: 'Roboto';
        font-size: 18px;
        color: #ffffff;
    }

    .accordion .card-body {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
    }
</style>

<script>
  const elementoTexto = document.getElementById('texto-escritura');
  const texto = 'Maquinaria y Equipos 💻';
  let indiceActual = 0;
  let tiempoEspera = 70; // Tiempo entre letras en milisegundos

  function escribirTexto() {
      if (indiceActual < texto.length) {
          elementoTexto.innerHTML += texto[indiceActual];
          indiceActual++;
          if (texto[indiceActual - 1] === ' ' || texto[indiceActual - 1] === '💻') {
              // Aumentar el tiempo de espera después de un espacio o al final
              setTimeout(escribirTexto, 650);
          } else {
              setTimeout(escribirTexto, tiempoEspera);
          }
      }
  }

  escribirTexto(); // Iniciar la función al cargar la página
</script>
@endsection
