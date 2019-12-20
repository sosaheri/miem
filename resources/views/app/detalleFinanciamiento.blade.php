@extends('layouts.app')

@section('content')

@if ( Auth::user()->hasRole('admin') )

    <div class="content">

    <div class="row">

<div class="col-md-12 titulo-home">

    <img class="log-interno" src="{{ asset('app/assets/img/logo.png') }}" alt="Logo Miem">

    <h2>MORATORIA MUNICIPAL EXTRAORDINARIA	RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h2>
</div>

</div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-single-02 text-warning"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                  <p class="card-category">Usuarios Registrados </p>
                    <p class="card-title">{{ $users }}
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-refresh"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-money-coins text-danger"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Monto Financiado</p>
                    <p class="card-title"> 1,345$
                      <p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-refresh"></i> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-credit-card text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Monto Pagado</p>
                      <p class="card-title"> 700$
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> 
                </div>
              </div>
            </div>
          </div>

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Comportamiento de usuarios</h5>
              <p class="card-category">actividad de la última semana</p>
            </div>
            <div class="card-body ">
              <canvas id=chartHours width="400" height="100"></canvas>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-history"></i> Actualizado hace 3 minutos
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    
@else

    <div class="content">


    @if ($message = Session::get('success'))



    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <div class="alert alert-success alert-with-icon alert-dismissible fade show" data-notify="container">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span data-notify="icon" class="nc-icon nc-bell-55"></span>
            <span data-notify="message">{{ $message }} </span>
          </div>
        </div> 
    </div>

    @endif

    @if ($message = Session::get('error'))

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <div class="alert alert-danger alert-with-icon alert-dismissible fade show" data-notify="container">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span data-notify="icon" class="nc-icon nc-bell-55"></span>
            <span data-notify="message">{{ $message }} </span>
          </div>
        </div> 
    </div>

    @endif

   
      <div class="row">

        <div class="col-md-12 titulo-home">

            <img class="log-interno" src="{{ asset('app/assets/img/logo.png') }}" alt="Logo Miem">

            <h2>MORATORIA MUNICIPAL EXTRAORDINARIA	RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h2>
        </div>
      
      </div>

      <div class="row">
        <div class="col-md-7">
          <div class="card ">
          @foreach( $finan as $fi )
          
            <div class="card-body " style="--aspect-ratio: 16/9;">
              <?php 
                    $url = Storage::url($fi->path);
              ?>
              <iframe src="{{  $url }}  " 
              style="border:0px #ffffff none;" 
              name="PortalTributario" scrolling="yes" 
              frameborder="1" 
              marginheight="0px" 
              marginwidth="0px" 
              height="800px" 
              width="650px" 
              allowfullscreen></iframe>

            </div>
            
            

          </div>
        </div>
        <div class="col-md-5">
          <div class="card card-user formulario">
            <div class="card-header">
              <h5 class="card-title"></h5>
            </div>
            <div class="card-body">
     

              <div class="row">
                <div class="col-md-12 pr-1">
               
                <b>Nota:</b> La actualizacion de su pago realizado, en nuestra base de datos, puede demorar hasta 10 dias habiles.
                  <br>
                  <ul>
                    @if($fi->status == 'pending')
                      <li><b>Estado</b>  <span class="payment-wait">Pendiente</span>  </li>
                    
                    @elseif($fi->status == 'approved')
                      <li><b>Estado</b>  <span class="payment-ok">Aprobado</span>  </li>
                    
                    @elseif($fi->status == '')
                      <li><b>Estado</b>  <span class="payment-ok">Sin datos de pago</span>  </li>
                    @endif
                    
                    <li><b>Monto Moratorio al 50%</b> {{ $fi->monto}}</li>
                    <li><b>Comprobante</b> {{ $fi->comprobante}}</li>
                    <li><b>id cedulon</b> {{ $fi->cedulon}}</li> 
                    <li><b>Fecha de solicitud</b> {{ $fi->fecha}}</li>
                    <li><b>Identificador de pago</b> {{ $fi->PaymentId}}</li>
                  </ul>
                @endforeach
                </div>

                <div style="margin:auto;">
                     <a href="{{ url('/miHistorico', Auth::user()->id) }}"><button class="btn btn-warning" >Regresar</button></a>
                                    

                    

                    @if($fi->status == 'pending')
                      <button class="btn btn-warning " role="link" onclick="window.location='{{  route('checkout', [$fi->monto, $fi->comprobante, $fi->cedulon ]) }}'">Pagar Cedulón</button>
                      
                      @elseif($fi->status == 'approved')
                      <button disabled="disabled" class="btn btn-warning">Pagar Cedulón</button>
                        
                      @elseif($fi->status == '')
                      
                      <button class="btn btn-warning " role="link" onclick="window.location='{{  route('checkout', [$fi->monto, $fi->comprobante, $fi->cedulon]) }}'">Pagar Cuota</button>
                    @endif

                      

                   
                </div>

                <div style="margin:auto;" >
                      @if($cuotasPendientes == '1')
                        <button  class="btn btn-warning"  role="link" onclick="window.location='{{  route('recibo', [$fi->comprobante]) }}'">Imprimir Comprobante de pago</button>
                      @else
                      <button disabled="disabled" class="btn btn-warning">Imprimir Comprobante de pago</button>
                        
                      @endif
                
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    
@endif



  

@endsection
