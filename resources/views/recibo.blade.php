
<!DOCTYPE html>
<html lang="es">
    <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>RECIBO MORATORIA</title>


    <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
        
    </head>
    <body>
    @foreach( $finan as $fi )

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 left">
                <img class="log-interno" src="{{ asset('app/assets/img/muni1.png') }}" alt="Logo Miem">
                </div>
                <div class="col-md-6 right">
                
                </div>
            </div>

            <div class="row">
                <div>
                <h3>RECIBO DE PAGO</h3>
                <h3>MORATORIA MUNICIPAL EXTRAORDINARIA<br> RUBRO AUTOMOTOR<br> AL 50% SOBRE MONTO ORIGINAL (CAPITAL E INTERES)</h3>

                </div>
                    

                <hr>
                <div class="contenido">
                <ul>
                    <li><b>Monto Original</b>: {{ number_format($fi->monto, 2 ) }} </li>
                    <li><b>Número de Comprobante</b>: {{ $fi->comprobante}} </li>
                    <li><b>Fecha de solicitud</b>: {{ $fi->fecha}} </li>
                    <li><b>Estado</b>: PAGADO </li>
                    
                </ul>
                 </div>
            </div>

    </div>



    


    @endforeach
    </body>
</html>