<?php
      

namespace App\Http\Controllers;

 // SDK de Mercado Pago
//require   '../vendor/autoload.php';

use App\Financiamiento;
use Illuminate\Http\Request;
use DB;
use Input;
use Storage;
use Auth;
use App\Cedulon;
use App\User;
use Session;
use Redirect;
use MercadoPago;


class FinanciamientoController extends Controller
{
    public function llenado(Request $request){
        
        //crear financiamiento
        Financiamiento::create([
            'user' => Auth::user()->id ,
            'monto' => (float) $request->monto ,
            'comprobante' => $request->comprobante ,
            'fecha' => $request->fecha ,
            'cuota' => $request->cuotas     
        ]);
        //actualizar usuario
        $user=User::where('id', '=', Auth::user()->id )->first();
 
        // Seteamos un nuevo titulo
        $user->address =  $request->direccion;
        $user->city =  $request->ciudad;
        $user->zip =  $request->zip;
        
        // Guardamos en base de datos
        $user->save();

        //ir a checkout

        return redirect()->route('checkout', [$request->monto]);
        
    }

    public function checkout( $monto ){

        //cambiar formato de decimales en el monto
        $montoNumber = str_replace('.', '', $monto);
        $monto = str_replace(',', '.', $montoNumber);
  
        // Agrega credenciales
        // MercadoPago\SDK::setAccessToken('TEST-5660167809190947-110911-d4b5794022464f174ad13d4615ef51a1-487722136');

        //token de prueba para sandbox
        MercadoPago\SDK::setAccessToken('TEST-3166106669218178-111215-af3d38550dfe7c8ec519e776765f812f-488712845');


        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        
       // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Financiamiento';
        $item->quantity = 1;
        $item->unit_price = (float) $monto;
        $preference->items = array($item);
        $preference->backurl = array(
            "success" =>  app_path() . "/success",
            "failure" => app_path() .  "/failure",
            "pending" => app_path() . "/pending"
        );
        $preference->save();
            
        //return view('app.chekout', ['preference'=>$preference ]);
        return view('app.chekout', ['preference'=>$preference ]);

        
    }

    
    public function callback(Request $request){

       // dd($request);

        $usuario_id = Auth::user()->id;
        $payment_id  = $request->payment_id;
        $merchant_order_id = $request->merchant_order_id;
        $payment_status = $request->payment_status;


        //actualizar financiamiento

        $finan =Financiamiento::where('id', '=', $usuario_id )->first();       

        $finan->PaymentID =  $payment_id;
        $finan->MerchantId = $merchant_order_id;
        $finan->status = $payment_status;
 
        // Guardamos en base de datos
        $finan->save();

        return Redirect::to('/');

        
    }

    
}
