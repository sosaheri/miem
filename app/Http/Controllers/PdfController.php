<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Financiamiento;
use App\Cedulon;
use App\User;
use Auth;
use DB;



class PdfController extends Controller
{
 

    public function recibo( $comprobante  ){
        
    
    

        $finan = Financiamiento::where('comprobante', '=', $comprobante )->get(); 
        $pdf = \PDF::loadView('recibo', compact('finan'));
        return $pdf->download('recibo.pdf');

        //return view('app.detalleFinanciamiento',  ['finan'=>$finan, 'cuotasPendientes'=> count($bandera) ]  );
                 
     }
}
