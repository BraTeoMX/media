@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
<h3 style="text-align: center">{{ $mensaje }}</h3>
  <div class="content">
     {{-- ... dentro de tu vista ... --}}
     @if(session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
     @endif

     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
         @if(session('sorteo'))
             <br>{{ session('sorteo') }}
         @endif
     </div>
     @endif
     @if(session('status')) {{-- A menudo utilizado para mensajes de estado genéricos --}}
         <div class="alert alert-secondary">
             {{ session('status') }}
         </div>
     @endif
     {{-- ... el resto de tu vista ... --}}
    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">
          

          <form method="POST" action="{{ route('registroVideo') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
               {{-- <label for="tituloVideo" class="form-label-custom">Titulo del video:</label> --}}
                <h4>Titulo del video:</h4>
                <input type="text" class="form-control" id="tituloVideo" name="tituloVideo" required>
            </div>
            <div class="form-group">
             {{-- <label for="descripcionVideo" class="form-label-custom">Descripcion del video:</label> --}}
              <h4>Descripción del video:</h4>
              <textarea  type="text" class="form-control" id="descripcionVideo" name="descripcionVideo" required></textarea>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                  <button type="button" class="btn btn-success btn-block" onclick="document.getElementById('cargaVideo').click();">
                      Cargar Video
                  </button>
                  <input type="file" class="form-control" id="cargaVideo" name="cargaVideo" required onchange="vistaPrevia(event)" style="display: none;">
                  <video id="vistaPreviaVideo" width="320" height="240" controls style="display:none;"></video>
              </div>
              <div class="col-md-6 form-group">
                
                <div class="col-md-6 form-group">
                  <label for="categoria" class="form-label">Categoría del video:</label>
                  <select class="custom-select" id="categoria" name="categoria_id" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                
                </div>
                
                <div class="col-md-6 form-group">
                  <label for="subcategoria" class="form-label">Subcategoría del video:</label>
                  <select class="custom-select" id="subcategoria" name="subcategoria_id">
                    <option value="">Primero seleccione una categoría</option>
                    <!-- Las opciones se añadirán dinámicamente aquí -->
                </select>
                
                </div>
              
              </div>
            
            </div>
          
          
          
    
            <button type="submit" class="btn btn-primary">Registrar / Subir contenido</button>
        </form>
        </div>

          <!-- Acordeón -->
      <div id="accordion">
        
        <!-- Tarjeta para Planta 1 -->
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Visualizar datos almacenados   
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <p>prueba </p>
                {{-- Campo de búsqueda --}}
                <div>
                  <input type="text" class="form-control"  id="searchInput" onkeyup="filterTable()" placeholder="Buscar por nombre o descripción...">
                </div>
                <table BORDER id="myTable">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Titulo </th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Accion </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td></td>
                                <td>{{ $video->titulo }}</td>
                                
                                <td style="text-align: left;">{{ $video->descripcion}}</td>
                                <td>{{ optional($video->categoria)->nombre ?? 'Sin categoría' }}</td>
                                <td>
                                  <form action="{{ route('video.ActualizarEstatus', $video->id) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      @if($video->estatus == 'A')
                                          <input type="hidden" name="estatus" value="B">
                                          <button class="btn-danger" type="submit">Dar de Baja</button>
                                      @else
                                          <input type="hidden" name="estatus" value="A">
                                          <button class="btn-secondary" type="submit">Dar de Alta</button>
                                      @endif
                                  </form>
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

              {{--Seccion final del acordeon  --}}
            </div>
          </div>
        </div>
      </div>
      {{--Fin acordeon --}}
    </div>
  </div>
  <style>
    .form-label-custom {
      font-size: 1.25rem; /* Ajusta esto a tu preferencia */
      font-weight: bold; /* Opcional: si quieres que el texto sea en negrita */
  }
    /* Estilos generales para la tabla */
    table {
        border-collapse: collapse;
        width: 100%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        border-radius: 8px;
        overflow: hidden; /* Asegura que los bordes redondeados se apliquen en los bordes de la tabla */
    }

    th, td {
        padding: 12px 15px; /* Ajusta el padding para más espacio */
        text-align: center;
        border-bottom: solid 1px #ddd; /* Línea sutil entre filas */
        color: black;
    }

    th {
        background-color: #bbcdce; /* Color de fondo para los encabezados */
        color: #333; /* Color del texto para los encabezados */
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f5f5; /* Color al pasar el ratón por encima de las filas */
    }

    /*apartado para los diseños de la vista */
    .custom-select {
        display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem 1.75rem .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="%23333" d="M173.898 136.504l114.103 114.102 114.102-114.102c4.686-4.686 12.284-4.686 16.97 0 4.686 4.686 4.686 12.284 0 16.971l-128 128c-4.686 4.686-12.284 4.686-16.971 0l-128-128c-4.686-4.686-4.686-12.284 0-16.971 4.686-4.686 12.284-4.686 16.97 0z"/></svg>');
        background-repeat: no-repeat;
        background-position: right .75rem center;
        background-size: .65em auto;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        appearance: none; /* Removes default browser styling */
    }

    .form-label {
        display: inline-block;
        margin-bottom: .5rem;
    }

    /* Focus and hover states */
    .custom-select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
    }

    /* Option to add an arrow icon */
    .custom-select::after {
        content: "\25BC";
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
        pointer-events: none;
    }

    /* When using custom background SVG for the select */
    .custom-select::-ms-expand {
        display: none; /* for IE11 */
    }

  </style>
  
  <script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable"); // Asegúrate de poner el id correcto de tu tabla
        tr = table.getElementsByTagName("tr");
    
        // Recorre todas las filas de la tabla y oculta las que no coinciden con la búsqueda
        for (i = 1; i < tr.length; i++) { // Comienza en 1 para saltar el encabezado de la tabla
            // Obtén las celdas de "Team Leaders" y "Modulo"
            var tdLeader = tr[i].getElementsByTagName("td")[1];
            var tdModule = tr[i].getElementsByTagName("td")[3];
            if (tdLeader || tdModule) {
                if (tdLeader.textContent.toUpperCase().indexOf(filter) > -1 || tdModule.textContent.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>
    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;
      
      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            panel.style.display = "none";
          } else {
            panel.style.display = "block";
          }
        });
      }
      </script>
      <script>
        function vistaPrevia(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('vistaPreviaVideo');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
      document.getElementById('tituloVideo').addEventListener('input', function(e) {
          e.target.value = e.target.value.toUpperCase();
      });
    </script>
    <script>
      document.getElementById('categoria').addEventListener('change', function() {
          var categoriaId = this.value;
          var url = `/video/${categoriaId}`; // Modifica con tu ruta real
      
          fetch(url)
              .then(response => response.json())
              .then(data => {
                  var subcategoriaSelect = document.getElementById('subcategoria');
                  subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';
      
                  data.forEach(subcategoria => {
                      var option = new Option(subcategoria.nombre, subcategoria.id);
                      subcategoriaSelect.add(option);
                  });
              })
              .catch(error => console.error('Error:', error));
      });
      </script>
      
@endsection


