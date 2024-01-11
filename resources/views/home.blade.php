@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="text-align: center">{{ __('Juntos por un mejor Intimark.') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="container mt-3">
                            <div class="row">
                                <!-- Opción 1 -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">REPORTE AUDITORIA DE ETIQUETAS <br>FCC-014</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Opción 2 -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">AUDITORIA EN PROCESO DE CORTE <br>FCC-004</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">REPORTE DE AUDITORIA EN CORTE <br>FCC-03</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">EVALUACION  DE CORTE CONTRA PATRON <br>FORMATO  F-4</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">CONTROL DE CALIDAD EN CORTE <br>FCC-010</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">SISTEMA SEMAFORO <br>FCC-016-C</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card">
                                        <img src="images/logo.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Pedir Accesos</h5>
                                            <a href="{{ route('reporte_etiqueta') }}" class="btn btn-primary" target="_blank">INICIAR</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Repite para cada opción que tengas -->
                                <!-- Botón para abrir el modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                                    Abrir Modal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">Título del Modal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                Aquí va el contenido de tu modal...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                        
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
