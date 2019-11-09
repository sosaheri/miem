<?php

namespace App\Http\Controllers;

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

         Session::flash('success', 'exito con cosa, la cosa');
        return Redirect::to('/');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *;
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Financiamiento  $financiamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Financiamiento $financiamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financiamiento  $financiamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Financiamiento $financiamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financiamiento  $financiamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financiamiento $financiamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financiamiento  $financiamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financiamiento $financiamiento)
    {
        //
    }
}
