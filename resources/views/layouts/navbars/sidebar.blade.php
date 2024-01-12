<!-- Sidebar.blade.php -->
<style>
    .nav-link:hover {
        background-color: #765341;
        color: white; /* Cambia el color del texto para que sea legible */
    }
    /* Clase personalizada para agregar sangría a la izquierda */
    .custom-indent {
        margin-left: 10px; /* Personaliza la cantidad de sangría según tus preferencias */
    }
</style>

<div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
     <!-- Encabezado con la imagen -->
     <div class="mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Encabezado-logo" class="img-fluid">
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="nav-link">
            <i class="fas fa-home"></i> Inicio
          </a>
        </li>
        <!-- Primer elemento colapsable -->
        <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#multimediaCollapse">
                <i class="fas fa-film"></i> Multimedia
            </a>
            <div class="collapse" id="multimediaCollapse">
                <ul class="nav flex-column ml-3 custom-indent">
                    <li class="nav-item">
                        <a href="{{ route('video.video') }}" class="nav-link">Subir Videos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('video.altaCategoriaSub') }}" class="nav-link">Altas y Bajas</a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Fin de Primer elemento colapsable --
    </ul>      
</div>
