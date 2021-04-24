<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Estado;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    //valida que se encuentre autenticado para acceder al controlador
    public function __construct()
    {
        //verifica que se encuentre logeado
        $this->middleware('auth');
    }
    //devuelve una lista de estados del pais 
    public function estados(Request $request,$id){
        //verifica que sea una peticion ajax
        if($request->ajax()){
            //busca los estados del pais y devuelve una lista en formato json
            $estados = Estado::where('country_id',$id)->get();
            return response()->json($estados);
        }
    }
    //devuelve una lista de ciudades del estado 
    public function ciudades(Request $request,$id){
        //verifica que sea una peticion ajax
        if($request->ajax()){
            //busca las ciudades del estado y devuelve una lista en formato json
            $ciudades = Ciudad::where('state_id',$id)->get();
            return response()->json($ciudades);
        }
    }
}
