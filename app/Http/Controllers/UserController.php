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

class UserController extends Controller
{
    public function index(){
        $users = User::all();

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

        

       $text = (new Pdf())
           ->setPdf(public_path().'/'.'2HeribertoSosaMunicipalidaddeCordoba-27_10_2019.PDF' )
           ->text();

           $data = explode("\n", strstr( strstr($text, 'TOTAL A PAGAR'), 
                                        'VALUAC.',
                                        true));
            
           

          dd( $data[5] ); //2 numero comprobante 5 monto

    

           //obtenemos el campo file definido en el formulario
           $file = $request->file('file');
 
           //obtenemos el nombre del archivo
           $nombre =   Auth::user()->id . str_replace(' ', '', Auth::user()->name)  . str_replace(' ', '', $file->getClientOriginalName());
           
           //indicamos que queremos guardar un nuevo archivo en el disco local
           \Storage::disk('local')->put($nombre,  \File::get($file));
     
         

           Session::flash('success', 'Editado Satisfactoriamente !');
                    return Redirect::to('/');

        
    }

}
