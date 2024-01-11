@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <!--Aqui se edita el encabezado que es el que se muestra -->
                <div class="card-header"><h2>REPORTE AUDITORIA DE ETIQUETAS</h2></div>
                <div class="card-body">
                    <!--Desde aqui inicia la edicion del codigo para mostrar el contenido--> 
                    <div class="d-flex justify-content-between">
                        <div>
                            Cliente: 
                            <select name="cliente" id="cliente">
                                <option value="">Selecciona una opción</option>
                                @foreach($CategoriaCliente as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            Fecha: {{ now()->format('d ') . $mesesEnEspanol[now()->format('n') - 1] . now()->format(' Y') }}
                        </div>
                    </div>
                    <div class="columna-en2">
                        <div class="column">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">TABLA PARA INSPECCION NORMAL: MUESTREO SIMPLE (MIL STD 105E)</th>
                                    </tr>
                                    <tr>
                                        <th>Tamaño de Lote</th>
                                        <th>Nivel General de inspección</th>
                                        <th>Letra Código para el tamaño de muestra</th>
                                        <th>Tamaño de Muestra</th>
                                        <th>Aprobado</th>
                                        <th>Rechazado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2 a 8</td>
                                        <td>A</td>
                                        <td>A</td>
                                        <td>2</td>
                                        <td>/</td>
                                        <td>/</td>
                                    </tr>
                                    <tr>
                                        <td>9 a 15</td>
                                        <td>B</td>
                                        <td>B</td>
                                        <td>3</td>
                                        <td>/</td>
                                        <td>/</td>
                                    </tr>
                                    <!-- Agrega más filas según los datos que tienes -->
                                    <tr>
                                        <td>500000 a más</td>
                                        <td>Q</td>
                                        <td>Q</td>
                                        <td>2000</td>
                                        <td>/</td>
                                        <td>/</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p>Observaciones:</p>
                            <textarea rows="4" cols="50"> </textarea>
                        </div>
                        <div class="column">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th>ESTILO</th>
                                        <th>NO/RECIBO</th>
                                        <th>TALLA/CANTIDAD</th>
                                        <th>Tamaño de Muestra</th>
                                        <th>DEFECTOS</th>
                                        <th>TIPO DE DEFECTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    <!-- Agrega más filas según los datos que tienes -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    <!-- Agrega más filas según los datos que tienes -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                                <label>
                                    <input type="checkbox" name="aprobado" value="aprobado" class="custom-checkbox"> Aprobado
                                </label>
                                <label>
                                    <input type="checkbox" name="rechazado" value="rechazado" class="custom-checkbox"> Rechazado
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                    <!--Fin de la edicion del codigo para mostrar el contenido--> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const checkboxes = document.querySelectorAll('.custom-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(otherCheckbox => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
</script>
@endsection
<style>
    .columna-en2 {
    display: flex;
    justify-content: space-between; /* Espacio entre las columnas */
    }

    .column {
        flex: 1; /* Cada columna ocupa la mitad del espacio disponible */
        padding: 10px; /* Espacio interno para los elementos dentro de cada columna */
    }

    .elemento {
        background-color: #ccc;
        margin-bottom: 10px; /* Espacio entre los elementos dentro de cada columna */
        padding: 5px;
    }

</style>
