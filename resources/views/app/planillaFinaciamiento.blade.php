@extends('layouts.app')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Solicitar Financiamiento</h5>
              </div>
              <div class="card-body">

                
              <form method="POST" action="{{ route('planillaFinanciamiento') }}" role="form">
              
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

               
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
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Monto</label>
                        <input type="text" readonly="readonly" name="monto" class="form-control" placeholder="Monto" value="{{ $monto }} ">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Fecha</label>
                        <input type="date"  readonly="readonly" name="fecha" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Cuotas</label>
                        
                        <select name="cuotas" class="form-control" id="">
                            <option value="3">3</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" value="">
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
                      <button type="submit" class="btn btn-primary btn-round">enviar</button>
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
