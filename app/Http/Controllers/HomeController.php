<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Financiamiento;
use App\Cedulon;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        $users = User::count();
        
        $finan = DB::table('financiamientos')
        ->join('cedulons', 'financiamientos.id-cedulon', '=', 'cedulons.id')
        ->sum('financiamientos.monto');
        

        $pagado = DB::table('financiamientos')
        ->join('cedulons', 'financiamientos.id-cedulon', '=', 'cedulons.id')
        ->where('cuotasPagadas', '=', 1)
        ->sum('financiamientos.monto');


        $request->user()->authorizeRoles(['user', 'admin']);


        
        return view('app.home', ['users'=>$users, 'finan'=>$finan, 'pagado'=>$pagado ]);
    }

    public function configuracion(){
       
        return view('app.configuracion');
    }

    public function update(Request $request){

        HomeController::changeEnvironmentVariable('MAIL_DRIVER',$request->MAIL_DRIVER);
        HomeController::changeEnvironmentVariable('MAIL_HOST',$request->MAIL_HOST);
        HomeController::changeEnvironmentVariable('MAIL_PORT',$request->MAIL_PORT);
        HomeController::changeEnvironmentVariable('MAIL_USERNAME',$request->MAIL_USERNAME);
        HomeController::changeEnvironmentVariable('MAIL_PASSWORD',$request->MAIL_PASSWORD);
        HomeController::changeEnvironmentVariable('MAIL_ENCRYPTION',$request->MAIL_ENCRYPTION);
        HomeController::changeEnvironmentVariable('MDP_PUBLIC_KEY',$request->MDP_PUBLIC_KEY);
        HomeController::changeEnvironmentVariable('MDP_ACCESS_TOKEN',$request->MDP_ACCESS_TOKEN);
       
        return redirect()->route('home');
    }

    public static function changeEnvironmentVariable($key,$value){
        $path = base_path() . '/.env';

        if(is_bool(env($key)))
        {
            $old = env($key)? 'true' : 'false';
        }
        elseif(env($key)===null){
            $old = 'null';
        }
        else{
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }
    }
}
