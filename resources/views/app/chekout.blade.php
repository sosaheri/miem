@extends('layouts.app')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Pasarela de pago</h5>
              </div>
              <div class="card-body">
                
                Procede a realizar el pago del financiamiento
                
                     <form action="/callback" method="GET"> 
                    
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>">
                            </script>
                    </form>
                    
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
 

@endsection
