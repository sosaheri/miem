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
                <h5 class="card-title">Pasarela de pago en moratoria</h5>
              </div>
              <div class="card-body">
                
                Proceda a realizar el pago del financiamiento.
                
                     <form style="margin-top: 30px;" action="/callback" method="GET"> 
                    
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>">
                            </script>
                    </form>

                   <p style="margin-top: 30px;" >Si realiza el pago con tarjeta, recuerde AUTORIZAR su pago, llamando a la administradora de su tarjeta de credito a efectos de que el mismo no resulte
Rechazado por Mercado Pago.</p>

                    
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
 

@endsection
