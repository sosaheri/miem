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

}
