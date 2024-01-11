@extends('layouts.app', ['activePage' => 'avanceproduccion', 'titlePage' => __('avanceproduccion')])

@section('content')
<h1 style="text-align: center">Reproductor de video </h1>
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
          <h3>{{ $mensaje }}</h3>

            <!-- Botón para abrir el modal principal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrincipal">Abrir Modal Principal</button>

            <!-- Modal Principal -->
            <div class="modal fade" id="modalPrincipal" tabindex="-1" role="dialog" aria-labelledby="modalPrincipalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPrincipalLabel">Modal Principal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido del Modal Principal.
                            Multinacionales como MicroStrategy19​ Time Inc.20​ y Dish Network21​ permiten el pago con bitcoines, así como Virgin Galactic22​23​ y Reddit,24​ entre otros.

En la actualidad una cantidad considerable de empresas y pequeños negocios aceptan bitcoines como medio de pago25​ para servicios de todo tipo. Su alcance internacional, y el hecho de que los usuarios pueden comerciar de forma pseudoanónima, ha permitido que se abra paso en sectores cada vez más regulados, como apuestas en línea y partidas de póker.26​


Cajero automático de bitcoines.
Los intercambios entre Bitcoin y moneda local suelen llevarse a cabo a través de plataformas en línea, encuentros presenciales27​ y cajeros automáticos especializados.28​29​30​31​32​

Existen diversidad de plataformas que facilitan el intercambio de Bitcoin por otras criptomonedas, incluyendo monedas de precio estable denominadas stablecoins.


Cartera electrónica Trezor.
Normalmente las transacciones con bitcoines se suelen hacer mediante un tipo de plataformas llamadas «carteras» o «billeteras», bien intangibles, en forma de programas informáticos, bien tangibles, en forma de dispositivos electrónicos. Algunos ejemplos de carteras electrónicas pueden ser las fabricadas por las empresas Trezor, OpenDime y Ledger, entre otras. También se pueden realizar transacciones usando billetes de papel con la clave privada impresa o monedas Casascius.33​

Existen complementos para la mayor parte de las plataformas de comercio electrónico, como WordPress, Drupal, entre otras, que facilitan su uso como medio de pago.34​
En la actualidad una cantidad considerable de empresas y pequeños negocios aceptan bitcoines como medio de pago25​ para servicios de todo tipo. Su alcance internacional, y el hecho de que los usuarios pueden comerciar de forma pseudoanónima, ha permitido que se abra paso en sectores cada vez más regulados, como apuestas en línea y partidas de póker.26​


Cajero automático de bitcoines.
Los intercambios entre Bitcoin y moneda local suelen llevarse a cabo a través de plataformas en línea, encuentros presenciales27​ y cajeros automáticos especializados.28​29​30​31​32​

Existen diversidad de plataformas que facilitan el intercambio de Bitcoin por otras criptomonedas, incluyendo monedas de precio estable denominadas stablecoins.


Cartera electrónica Trezor.
Normalmente las transacciones con bitcoines se suelen hacer mediante un tipo de plataformas llamadas «carteras» o «billeteras», bien intangibles, en forma de programas informáticos, bien tangibles, en forma de dispositivos electrónicos. Algunos ejemplos de carteras electrónicas pueden ser las fabricadas por las empresas Trezor, OpenDime y Ledger, entre otras. También se pueden realizar transacciones usando billetes de papel con la clave privada impresa o monedas Casascius.33​

Existen complementos para la mayor parte de las plataformas de comercio electrónico, como WordPress, Drupal, entre otras, que facilitan su uso como medio de pago.34​
En la actualidad una cantidad considerable de empresas y pequeños negocios aceptan bitcoines como medio de pago25​ para servicios de todo tipo. Su alcance internacional, y el hecho de que los usuarios pueden comerciar de forma pseudoanónima, ha permitido que se abra paso en sectores cada vez más regulados, como apuestas en línea y partidas de póker.26​


Cajero automático de bitcoines.
Los intercambios entre Bitcoin y moneda local suelen llevarse a cabo a través de plataformas en línea, encuentros presenciales27​ y cajeros automáticos especializados.28​29​30​31​32​

Existen diversidad de plataformas que facilitan el intercambio de Bitcoin por otras criptomonedas, incluyendo monedas de precio estable denominadas stablecoins.


Cartera electrónica Trezor.
Normalmente las transacciones con bitcoines se suelen hacer mediante un tipo de plataformas llamadas «carteras» o «billeteras», bien intangibles, en forma de programas informáticos, bien tangibles, en forma de dispositivos electrónicos. Algunos ejemplos de carteras electrónicas pueden ser las fabricadas por las empresas Trezor, OpenDime y Ledger, entre otras. También se pueden realizar transacciones usando billetes de papel con la clave privada impresa o monedas Casascius.33​

Existen complementos para la mayor parte de las plataformas de comercio electrónico, como WordPress, Drupal, entre otras, que facilitan su uso como medio de pago.34​


                            <!-- Botón para abrir el modal anidado -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAnidado">Abrir Modal Anidado</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Anidado -->
            <div class="modal fade" id="modalAnidado" tabindex="-1" role="dialog" aria-labelledby="modalAnidadoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAnidadoLabel">Modal Anidado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Contenido del Modal Anidado.
                        </div>
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalAnidadoLabel">Modal Anidado</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Contenido del Modal Anidado.
                      </div>
                    </div>
                </div>
            </div>

          
        </div>

         

    </div>
  </div>
  
@endsection


