<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Estado;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function __construct()
    {
        //verifica que se encuentre logeado
        $this->middleware('auth');
    }

    public function estados(Request $request,$id){
        if($request->ajax()){
            $estados = Estado::where('country_id',$id)->get();
            return response()->json($estados);
        }
    }
    public function ciudades(Request $request,$id){
        if($request->ajax()){
            $ciudades = Ciudad::where('state_id',$id)->get();
            return response()->json($ciudades);
        }
    }
}
