@extends('layouts.app')

@section('content')

@if (  Auth::user()->hasRole('admin')  )

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Historico</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                     <th>
                        Usuario
                      </th>
                      <th>
                        Fecha
                      </th>
                      <th>
                        Número de comprobante
                      </th>
                      <th>
                        Monto
                      </th>
                      <th class="text-right">
                        Estado
                      </th>
                    </thead>
                    <tbody>

                    @foreach( $finan as $fi )
        
    
                      <tr>
                      <td>
                        Usuario
                        </td>
                        <td>
                        {{ $fi->fecha }}
                        </td>
                        <td>
                        {{ $fi->comprobante }}
                        </td>
                        <td>
                        {{ $fi->monto }}
                        </td>
                        <td class="text-right">
                            <a href="#">{{ $fi->status }}</a>
                        </td>
                      </tr>

                      @endforeach

                    

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
   
        </div>
      </div>

@else

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Historico</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Fecha
                      </th>
                      <th>
                        Número de comprobante
                      </th>
                      <th>
                        Monto
                      </th>
                      <th class="text-right">
                        Estado
                      </th>
                    </thead>
                    <tbody>

                    @foreach( $finan as $fi )
        
    
                      <tr>
                        <td>
                        {{ $fi->fecha }}
                        </td>
                        <td>
                        {{ $fi->comprobante }}
                        </td>
                        <td>
                        {{ $fi->monto }}
                        </td>
                        <td class="text-right">
                            <a href="./detalleFinanciamiento.html">{{ $fi->status }}</a>
                        </td>
                      </tr>

                      @endforeach

                    

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
   
        </div>
      </div>

@endif
 

@endsection
