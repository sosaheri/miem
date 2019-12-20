<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use Auth;
use Spatie\PdfToText\Pdf;
use App\Cedulon;
use App\Financiamiento;

class UserController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', 1 )->get();

        return view('app.gestionUsuarios', compact('users')); 
    }

    public function ver($id){
        

        $user = User::find($id);
        return view('app.verUsuario', ['user'=>$user]);
    }

    public function verPerfil($id){
        

        $user = User::find($id);
        return view('app.miUsuario', ['user'=>$user]);
    }

    public function update(Request $request, $id){        
        // Recibo todos los datos desde el formulario Actualizar
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
    
        // Actualizo los datos en la tabla 'user'
        $user->save();

        if(Auth::user()->hasRole('admin')){
                    // Muestro un mensaje y redirecciono a la vista principal 
                    Session::flash('success', 'Editado Satisfactoriamente !');
                    return Redirect::to('gestionUsuarios');
        }else{

                     // Muestro un mensaje y redirecciono a la vista principal 
                    Session::flash('success', 'Editado Satisfactoriamente !');
                    return Redirect::to('/');
        }
    

    }

    public function eliminar($id){
        // Indicamos el 'id' del registro que se va Eliminar
        $user = User::find($id);
                 
        // Elimino el registro de la tabla 'u' 
        User::destroy($id);
            
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('success', 'Eliminado Satisfactoriamente !');
        return Redirect::to('gestionUsuarios');
    }

    public function financiamiento(Request $request){        
        // Recibo todos los datos desde el formulario de cedulon
 
        if( $request->hasFile('file') ){
                $path = $request->file->store('/');
                $id = Cedulon::create(['path' => $path ]);

                $text = (new Pdf())
                ->setPdf(public_path().'/'. $id->getUrl() )
                ->text();


                $firstLine  = explode("\n", $text);

               
               
                if($firstLine[0] == 'Contribución sobre' && $firstLine[1] == 'AUTOMOTORES' ){
                    

                        $data = explode("\n", strstr( strstr($text, 'TOTAL A PAGAR'), 
                        'VALUAC.',
                        true));

                                                                       
                      //Session::flash('success', 'cargo exitosamente el PDF !');
                       //return Redirect::to('/');

                        $comprobante = $data[2];         //2 numero comprobante    
                        
                        if( $data[5] == '' ){
                            $monto =  ltrim($data[7], '$'); // 5 monto
                        }else {
                            $monto =  ltrim($data[5], '$');
                        }

                       // dd($monto);
                        
                        $user = Auth::user();
                        
                        
                        

                       return view('app.planillaFinaciamiento', ['user'=>$user, 'comprobante'=>$comprobante, 'monto'=>$monto, 'idCed'=>$id->id ]);

                }else{

                    unlink(public_path().'/'. $id->getUrl() );

                                      
                    Cedulon::destroy($id);

                    Session::flash('error', 'PDF incorrecto, debe utilizar un cedulón para automoviles!');
                    return Redirect::to('/');

                }
                

                
            }      
                   

        
    }

}
