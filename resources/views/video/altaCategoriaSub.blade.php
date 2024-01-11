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
    {{-- Mensajes de sesión --}}
    {{-- ... tu código existente para mostrar mensajes de sesión ... --}}

    <div class="container-fluid">
        <div class="card-header card-header-info card-header-icon">

          {{-- Formulario para agregar una nueva categoría --}}
          <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nombreCategoria">Nombre de la Categoría</label>
              <input type="text" class="form-control" id="nombreCategoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Categoría</button>
          </form>

          {{-- Formulario para agregar una nueva subcategoría --}}
          <form action="{{ route('subcategoria.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <select class="form-control" id="categoria" name="categoria_id" required>
                @foreach($categoriaMostrar as $categoria)
                  <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="nombreSubcategoria">Nombre de la Subcategoría</label>
              <input type="text" class="form-control" id="nombreSubcategoria" name="nombre_subcategoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Subcategoría</button>
          </form>

        </div>

        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Alta o Baja
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                      {{-- seccion para introducir contenido --}}
                      <div class="row">
                        <div class="col-md-6">
                          {{-- Campo de búsqueda --}}
                          <div>
                            <input type="text" class="form-control" id="searchInput1" onkeyup="filterTable('searchInput1', 'myTable1')" placeholder="Buscar por nombre o descripción...">
                          </div>
                          <table BORDER id="myTable1">
                              <thead>
                                  <tr>
                                      <th>ID </th>
                                      <th>Categoria</th>
                                      <th>Accion </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($categorias as $categoria)
                                      <tr>
                                          <td>{{ $categoria->id }}</td></td>
                                          <td>{{ $categoria->nombre }}</td>
                                          <td>
                                            <form action="{{ route('categoria.ActualizarEstatusCategoria', $categoria->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @if($categoria->estatus == 'A')
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
                        </div>
                        <div class="col-md-6">
                          {{-- Campo de búsqueda --}}
                          <div>
                            <input type="text" class="form-control" id="searchInput2" onkeyup="filterTable('searchInput2', 'myTable2')" placeholder="Buscar por nombre o descripción...">
                          </div>
                          <table BORDER id="myTable2">
                              <thead>
                                  <tr>
                                      <th>ID </th>
                                      <th>SubCategoria</th>
                                      <th>Accion </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($subcategorias as $subcategoria)
                                      <tr>
                                          <td>{{ $subcategoria->id }}</td></td>
                                          <td>{{ $subcategoria->nombre }}</td>
                                          <td>
                                            <form action="{{ route('categoria.ActualizarEstatusSubCategoria', $subcategoria->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @if($subcategoria->estatus == 'A')
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
                        </div>

                      {{--Fin de apartado para introducir contenido  --}}
                  </div>
              </div>
          </div>
        </div>
        
    </div>
  </div>



  <script>
    document.getElementById('nombreCategoria').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
    document.getElementById('nombreSubcategoria').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
  </script>

<script>
  document.getElementById('categoria').addEventListener('change', function() {
      var categoriaId = this.value;
      var url = `{{ url('/subcategorias-por-categoria') }}/${categoriaId}`;
  
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
  
  <script>
    function filterTable(inputId, tableId) {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById(inputId);
      filter = input.value.toUpperCase();
      table = document.getElementById(tableId);
      tr = table.getElementsByTagName("tr");
    
      for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Cambiar el índice según la columna que deseas filtrar
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
    
  
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

@endsection
