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
                <h5 class="card-title">Solicitar Moratoria con 50% de descuento sobre (Capital e Intereses).
</h5>
              </div>
              <div class="card-body">

                
              <form method="POST" action="{{ route('planillaFinanciamiento') }}" role="form">
              
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idCed" value="{{ $idCed }}">

               
                  <div class="row">

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="name" readonly="readonly" class="form-control" placeholder="Usuario" value="{{ $user->name}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" name="email" readonly="readonly" class="form-control" placeholder="Email" value="{{ $user->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Número de Comprobante del Cedulón</label>
                        <input type="text" readonly="readonly" name="comprobante" class="form-control" placeholder="Número de comprobante" value="{{ $comprobante }}">
                      </div>
                    </div>

                    <div class="col-md-6 pl-1 ">
                      <div class="form-group">
                        <label>Fecha</label>
                        <input type="date"  readonly="readonly" name="fecha" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                      </div>
                    </div>

                  </div>
                  <div class="row">

                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Monto Original</label>
                        <input type="text" readonly="readonly" name="montocompleto" class="form-control" placeholder="Monto" value="{{ $monto }} ">
                      </div>
                    </div>

                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Monto con Moratoria al 50%.</label>
                        
                        <input type="text" readonly="readonly" name="monto" class="form-control" placeholder="Monto" value="{{ str_replace(',', '.', str_replace('.', '', $monto)) * 0.5 }} ">
                      </div>
                    </div>

                    
                  
                  </div>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="{{  $user->address}}">
                      </div>
                    </div>

                    

                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" value="{{  $user->city}}">
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Código Postal</label>
                        <input type="text" name="zip" class="form-control" placeholder="Código Postal">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Solicitar Moratoria</button>
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
