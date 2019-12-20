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
                    <p class="card-title"> {{ $finan }}
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
                      <p class="card-title"> {{ $pagado }}
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
      <!-- <div class="row">
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
      </div> -->

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
            <div class="card-header ">
              <h5 class="card-title">Portal Tributario</h5>
            </div>
            <div class="card-body " style="--aspect-ratio: 16/9;">

              <iframe src="https://servicios2.cordoba.gov.ar/Tributario/Tributo.aspx?t=txCaWS#no-back-button" 
              style="border:0px #ffffff none;" 
              name="PortalTributario" scrolling="yes" 
              frameborder="1" 
              marginheight="0px" 
              marginwidth="0px" 
              height="500px" 
              width="650px" 
              allowfullscreen></iframe>

            </div>
            
            <div class="card-footer">
              <h5 class="card-title">Pulse REGRESAR, para actualizar los datos.</h5>
            </div>

          </div>
        </div>
        <div class="col-md-5">
          <div class="card card-user formulario">
            <div class="card-header">
              <h5 class="card-title">Cargar cedulón al sistema</h5>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('iniciarFinanciamiento') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            

                        @csrf
                
                <div class="row">
                  <div class="col-md-12 pr-1">
                    

                    <div class="form-group form-file-upload form-file-simple">
                        <label> </label>
                     
               
                      <label for="file-upload" class="custom-file-upload">
                      <i class="fa fa-cloud-upload"></i> Agregar archivo PDF del cedulón</label>

    <input id="file-upload" name='file' type="file" style="display:none;" required>
    <label id="file-name"></label>



                  </div>
                  </div>
                
                </div>

                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Guardar PDF </button>
                  </div>
                </div>
              </form>

              <div class="row">
                <div class="col-md-12 pr-1">
                    <ul>
                      <li>Seleccione en el panel tributario los Tributos a incluir.</li>
                      <li>Descargue el cedulón a su ordenador con opción pago efectivo-hoy, elija los periodos.</li>
                      <li>Cargue el cedulón al sistema de financiamiento.</li>
                      <li>Guardar el PDF y continúe en PAGOS.</li>
                    </ul>
                </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    
@endif



  

@endsection
