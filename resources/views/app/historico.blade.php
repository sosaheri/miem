@extends('layouts.app')

@section('content')

@if (  Auth::user()->hasRole('admin')  )

<div class="content">
<<<<<<< HEAD

<div class="row">

<div class="col-md-12 titulo-home">

    <img class="log-interno" src="{{ asset('app/assets/img/logo.png') }}" alt="Logo Miem">

    <h2>MORATORIA MUNICIPAL EXTRAORDINARIA	RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h2>
</div>

</div>

=======
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
<<<<<<< HEAD
                <h4 class="card-title"> Historial de Financiamientos en Moratoria</h4>
=======
                <h4 class="card-title"> Historico</h4>
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
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
<<<<<<< HEAD
                        Monto al 50%
                      </th>

=======
                        Monto
                      </th>
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
                      <th class="text-right">
                        Estado
                      </th>
                    </thead>
                    <tbody>

                    @foreach( $finan as $fi )
        
    
                      <tr>
                      <td>
<<<<<<< HEAD
                      <a href="{{ url('/verUsuario', $fi->user) }}"> {{ $fi->name }} </a>
=======
                        Usuario
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
                        </td>
                        <td>
                        {{ $fi->fecha }}
                        </td>
                        <td>
                        {{ $fi->comprobante }}
                        </td>
                        <td>
<<<<<<< HEAD
                        {{ number_format((float)(float)$fi->monto, 2, ',', '') }}
                        </td>
             
                        <td class="text-right">
                            
                            @if( $fi->status == 'pending' )
                            <span class="payment-wait" >Pendiente</span>
                            @elseif( $fi->status == 'approved' )
                            <span class="payment-ok" >Aprobado</span>
                            @elseif( $fi->status == '' )
                            <span class="payment-404" >Sin Datos de Pago</span>
                            @endif
=======
                        {{ $fi->monto }}
                        </td>
                        <td class="text-right">
                            <a href="#">{{ $fi->status }}</a>
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
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
<<<<<<< HEAD

<div class="row">

<div class="col-md-12 titulo-home">

    <img class="log-interno" src="{{ asset('app/assets/img/logo.png') }}" alt="Logo Miem">

    <h2>MORATORIA MUNICIPAL EXTRAORDINARIA	RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h2>
</div>

</div>
=======
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
<<<<<<< HEAD
                <h4 class="card-title"> Historial de Financiamientos en Moratoria</h4>
=======
                <h4 class="card-title"> Historico</h4>
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
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
<<<<<<< HEAD
                        Monto al 50%
=======
                        Monto
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
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
<<<<<<< HEAD
                        {{     number_format((float)(float)$fi->monto, 2, ',', '') }}
                        </td>
                        <td class="text-right">
                            @if( $fi->status == 'pending' )
                            <a class="payment-wait" href="{{ url('/detalleFinanciamiento', $fi->id ) }}">Pendiente</a>
                            @elseif( $fi->status == 'approved' )
                            <a class="payment-ok" href="{{ url('/detalleFinanciamiento',  $fi->id ) }}">Aprobado</a>
                            @elseif( $fi->status == '' )
                            <a class="payment-404" href="{{ url('/detalleFinanciamiento',  $fi->id ) }}">Sin Datos de Pago</a>
                            @endif
                          
                            
=======
                        {{ $fi->monto }}
                        </td>
                        <td class="text-right">
                            <a href="./detalleFinanciamiento.html">{{ $fi->status }}</a>
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd
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
