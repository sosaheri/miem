@extends('layouts.app')

@section('content')

@if ( Auth::user()->hasRole('admin') )

    <div class="content">
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
          </div>
        </div>
        <div class="col-md-5">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Cargar cedulón al sistema</h5>
            </div>
            <div class="card-body">
              <form>
                
                <div class="row">
                  <div class="col-md-12 pr-1">
                    

                    <div class="form-group form-file-upload form-file-simple">
                      <label> </label>
                      <label class="custom-file-label" for="inputFile ">Archivo PDF del cedulón</label>
                      <input type="file" class="form-control inputFileVisible" id="inputFile">
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
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet facilis accusantium delectus. Quaerat est at vitae unde consequuntur ut facilis quam debitis nesciunt tenetur ipsum nostrum, aliquid distinctio libero repellendus!</p>

                </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    
@endif



  

@endsection
