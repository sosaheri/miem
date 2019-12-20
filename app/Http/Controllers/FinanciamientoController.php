<?php
      

namespace App\Http\Controllers;

 // SDK de Mercado Pago
//require   '../vendor/autoload.php';

use App\Financiamiento;
use App\Cedulon;
use Illuminate\Http\Request;
use DB;
use Input;
use Storage;
use Auth;
use App\User;
use Session;
use Redirect;
use MercadoPago;


class FinanciamientoController extends Controller
{

    public function llenado(Request $request){

<<<<<<< HEAD
       //dd($request);

        //cambiar formato de decimales en el monto
       // $montoNumber = str_replace('.', '', $request->monto );
       // $monto = str_replace(',', '.', $montoNumber);
        
        $registros = \DB::table('financiamientos')->where('comprobante', '=', $request->comprobante)
                ->get();

          

        if ( count($registros) == 0){
  

                    //crear financiamiento
                    Financiamiento::create([
                        'user' => Auth::user()->id ,
                        'monto' => (float) $request->monto,
                        'ref' => 'P',
                        'id-cedulon' => $request->idCed ,
                        'comprobantePadre' => $request->comprobante ,
                        'comprobante' => $request->comprobante ,
                        'fecha' => $request->fecha ,
                        'cuota' => 1,
                        'cuotasPagadas' => 0,
                        
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
                
                return redirect()->route('checkout', [$request->monto, $request->comprobante, $request->idCed ]);
=======
        //cambiar formato de decimales en el monto
        $montoNumber = str_replace('.', '', $request->monto );
        $monto = str_replace(',', '.', $montoNumber);
        
        //crear financiamiento
        Financiamiento::create([
            'user' => Auth::user()->id ,
            'monto' => (float) $monto ,
            'comprobante' => $request->comprobante ,
            'fecha' => $request->fecha ,
            'cuota' => 0    
        ]);
        //actualizar usuario
        $user=User::where('id', '=', Auth::user()->id )->first();
 
        // Seteamos un nuevo titulo
        $user->address =  $request->direccion;
        $user->city =  $request->ciudad;
        $user->zip =  $request->zip;
        
        // Guardamos en base de datos   
        $user->save();
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd

        }else {

            Session::flash('error', 'El Cedulon ya se encuentra registrado!');
            return Redirect::to('/');
        }

        
        
    }

    public function checkout( $monto, $comprobante, $cedulon ){
        
       
        if( $comprobante){

            $finan = Financiamiento::where('comprobante', '=', $comprobante )->delete();

           
            Financiamiento::create([
                'user' => Auth::user()->id ,
                'monto' => $monto,
                'ref' => 'P',
                'id-cedulon' => $cedulon ,
                'comprobantePadre' => $comprobante ,
                'comprobante' => $comprobante ,
                'fecha' => new \DateTime(),
                'cuota' => 1,
                'cuotasPagadas' => 0,
                
            ]);
        }
        
    
        MercadoPago\SDK::setAccessToken(getenv('MDP_ACCESS_TOKEN'));

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
        // $preference->payment_methods = array(
            
        //     "installments" => 12
        //   );

        $preference->save();
            
        return view('app.chekout', ['preference'=>$preference ]);

        
    }
   
<<<<<<< HEAD
     public function callback(Request $request){
=======
    public function callback(Request $request){
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd

        //dd($request);

        $usuario_id = Auth::user()->id;
        $payment_id  = $request->payment_id;
        $merchant_order_id = $request->merchant_order_id;
        $payment_status = $request->payment_status;


        //actualizar financiamiento

        $finan =Financiamiento::where('user', '=', $usuario_id )
                                ->whereNull('status')
                                ->first();       

        $finan->PaymentID =  $payment_id;
        $finan->MerchantId = $merchant_order_id;
        $finan->status = $payment_status;
 
        if($payment_status == 'approved'){

            $finan->cuotasPagadas++; 

        }
        
        // Guardamos en base de datos
        $finan->save();
       // dd($usuario_id );
        //return Redirect::to('/miHistorico', ['id'=> $usuario_id  ] );
        return redirect()->route('miHistorico', ['id'=> $usuario_id  ]);
<<<<<<< HEAD

        
     }

     public function miHistorico( $id ){

        $finan =Financiamiento::where('user', '=', $id )
        //->where('ref', '!=', 'C' )
        ->get(); 

       

        return view('app.historico', compact('finan') );
                 
     }

     public function historico( ){
=======
>>>>>>> 6addbd22450faec99932f0552b2f46a4c6f558bd

        
        $finan = DB::table('financiamientos')->select('users.name', 'financiamientos.user', 'financiamientos.fecha' ,'financiamientos.comprobante', 'financiamientos.monto', 'financiamientos.status', 'financiamientos.cuotasPagadas', 'financiamientos.cuota')
                        ->join('users', function ($join){
                            $join->on('users.id', '=', 'financiamientos.user');
                        })
                        //->where('financiamientos.ref', '!=', 'C' )
                        ->get();

                  

       // $finan =Financiamiento::all(); 

        return view('app.historico', compact('finan') );
        //return view('app.historico')->with($finan, compact('finan'));
                 
     }

     public function status( Request $request){

        MercadoPago\SDK::setAccessToken("TEST-3166106669218178-111215-af3d38550dfe7c8ec519e776765f812f-488712845");

        $merchant_order = null;

        switch($_GET["topic"]) {
            case "payment":
                $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
                // Get the payment and the corresponding merchant_order reported by the IPN.
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
                break;
            case "merchant_order":
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
                break;
        }
    
        $paid_amount = 0;
        foreach ($merchant_order->payments as $payment) {
            if ($payment['status'] == 'approved'){
                $paid_amount += $payment['transaction_amount'];

                
            }
        }
        error_log('$paid_amount'); 
    
        // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
        if($paid_amount >= $merchant_order->total_amount){
            if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
                if($merchant_order->shipments[0]->status == "ready_to_ship") {
                    print_r("Totally paid. Print the label and release your item.");
                }
            } else { // The merchant_order don't has any shipments
                print_r("Totally paid. Release your item.");
            }
        } else {
            print_r("Not paid yet. Do not release your item.");
        }




    
        return response('OK', 200);
                 
     }   
     
     public function detalle( $id ){
        
        $finan = Financiamiento::where('id', '=', $id )->get(); 
        
         //   $ced = Cedulon::where('id', '=', $finan->id-cedulon )->get();

        $finan = DB::table('financiamientos')
        ->join('cedulons', 'financiamientos.id-cedulon', '=', 'cedulons.id')
        ->select('financiamientos.monto', 'financiamientos.ref', 'financiamientos.id-cedulon as cedulon' ,'financiamientos.cuotasPagadas','financiamientos.comprobante', 'financiamientos.comprobantePadre', 'financiamientos.fecha', 'financiamientos.cuota', 'financiamientos.status', 'financiamientos.PaymentId', 'cedulons.path')
        ->where('financiamientos.id', '=', $id)
        ->get();   

        $bandera = DB::table('financiamientos')
        ->select('financiamientos.comprobante', 'financiamientos.cuotasPagadas')
        ->where('financiamientos.comprobante', '=', $finan[0]->comprobante )
        ->where('cuotasPagadas', '=', 1)                                        
        ->get();

        //dd($finan );

        return view('app.detalleFinanciamiento',  ['finan'=>$finan, 'cuotasPendientes'=> count($bandera) ]  );
                 
     }

    public function miHistorico( $id ){

        $finan =Financiamiento::where('user', '=', $id )->get(); 

        return view('app.historico', compact('finan') );
                 
     }

     public function historico( ){

        $finan =Financiamiento::all(); 

        return view('app.historico', compact('finan') );
                 
     }

    
}
