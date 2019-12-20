@extends('layouts.app')

@section('content')

<div class="content">

<div class="row">

<div class="col-md-12 titulo-home">

    <img class="log-interno" src="{{ asset('app/assets/img/logo.png') }}" alt="Logo Miem">

    <h2>MORATORIA MUNICIPAL EXTRAORDINARIA	RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h2>
</div>

</div>

        <div class="row">
        <div class="col-md-2"></div>

          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Configurar ambiente</h5>
              </div>
              <div class="card-body">

                
              <form method="POST" action="{{ route('updateConfig') }}" role="form" >
              
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                  <h6>Configuracion de correo</h6>
                 
               
                  <div class="row">

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Mail Driver</label>
                        <input type="text" name="MAIL_DRIVER" class="form-control"  value="{{ getenv('MAIL_DRIVER') }}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Host </label>
                        <input type="text" name="MAIL_HOST" class="form-control"  value="{{ getenv('MAIL_HOST') }}">
                      </div>
                    </div>
                  </div>
 
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Port</label>
                        <input type="text" name="MAIL_PORT" class="form-control"  value="{{ getenv('MAIL_PORT') }}">
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="MAIL_USERNAME" class="form-control" value="{{ getenv('MAIL_USERNAME') }}">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Clave</label>
                        <input type="password" name="MAIL_PASSWORD" class="form-control"  value="{{ getenv('MAIL_PASSWORD') }}">
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Encriptación</label>
                        <input type="text"name="MAIL_ENCRYPTION" class="form-control"  value="{{ getenv('MAIL_ENCRYPTION') }}">
                      </div>
                    </div>
                    
                  </div>

                  
                  <h6 style="margin-top:30px;">Configuración de Mercado Pago</h6>
                  

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Public key</label>
                        <input type="text" name="MDP_PUBLIC_KEY" class="form-control"  value="{{ getenv('MDP_PUBLIC_KEY') }}">
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Access token</label>
                        <input type="text" name="MDP_ACCESS_TOKEN" class="form-control"  value="{{ getenv('MDP_ACCESS_TOKEN') }}">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Actualizar datos</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <div class="col-md-2"></div>
        </div>
      </div>
  

@endsection
