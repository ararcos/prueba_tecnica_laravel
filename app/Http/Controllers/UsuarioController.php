<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Pais;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    //instancia un variable para guardar el index que se esta editando
    public $editedUserIndex = null;

    //crea la instancia del controlador
    public function __construct()
    {
        //verifica que se encuentre logeado
        $this->middleware('auth');
    }

    //muestra la pantalla de inicio (datos personales de la persona Autenticada)
    public function index()
    {
        return view("usuario.index", ['usuario' => auth()->user()]);
    }

    //muestra una tabla de usuarios permitiendole agregar, modificar, eliminar
    public function listar(Request $request)
    {
        $paises = Pais::all();
        $buscar = $request->get("buscar");
        $tipo = $request->get("tipo");
        $usuarios = User::buscarpor($tipo, $buscar)->simplePaginate(10);
        return view("usuario.listar", compact("usuarios", "paises"));
    }

    //muestra un formulario para crear un nuevo usuario
    public function create()
    {
        $paises = Pais::all();
        return view("usuario.create", compact('paises'));
    }

    //guarda los datos de un nuevo usuario
    public function store(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format("Y-m-d");
        $request->validate([
            'nombre' => 'required|max:100',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|max:16|regex:/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/|confirmed',
            'password_confirmation' => 'required|min:8|max:16',
            'cedula' => 'required|max:11',
            'fecha' => 'required|date|before_or_equal:' . $before,
            'numero' => 'nullable|size:10',
            'ciudad' => 'required',
        ]);

        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->numero = $request->numero;
        $usuario->ciudad = $request->ciudad;
        $usuario->fecha_nacimiento = $request->fecha;
        $usuario->password = $request->password;
        $usuario->encriptarPassword();
        $usuario->save();

        return redirect()->route('usuarios');
    }
    public function update(Request $request)
    {
        if($request->id){
            $dt = new Carbon();
            $before = $dt->subYears(18)->format("Y-m-d");
            $request->validate([
                'nombre' => 'required|max:100',
                'fecha' => 'required|date|before_or_equal:' . $before,
                'numero' => 'nullable|size:10',
                'ciudad' => 'required',
            ]);
            $user = User::find($request->user_id);
            $user->nombre = $request->nombre;
            $user->fecha = $request->fecha;
            $user->numero = $request->numero;
            $user->ciudad = $request->ciudad;
            $user->save();
            return redirect()->route('usuarios');
        }
    }

    public function delete(Request $request)
    {
        if($request->user_id){
            User::find($request->user_id)->delete();
        }
        return redirect()->route('usuarios');
    }
}
