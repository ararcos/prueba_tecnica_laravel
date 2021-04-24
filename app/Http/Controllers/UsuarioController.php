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
        //obtiene todos los datos de la tabla paises
        $paises = Pais::all();
        //obtiene el parametro buscar
        $buscar = $request->get("buscar");
        //obtiene el parametro tipo
        $tipo = $request->get("tipo");
        //llama a la funcion del modelo buscar por 
        $usuarios = User::buscarpor($tipo, $buscar)->simplePaginate(10);
        //envia una la lista de usuarios a la vista
        return view("usuario.listar", compact("usuarios", "paises"));
    }

    //muestra un formulario para crear un nuevo usuario
    public function create()
    {
        //obtiene todos los datos de la tabla paises y envia a la vista create
        $paises = Pais::all();
        return view("usuario.create", compact('paises'));
    }

    //guarda los datos de un nuevo usuario
    public function store(Request $request)
    {
        //obtiene la fecha hace 18 años
        $dt = new Carbon();
        $before = $dt->subYears(18)->format("Y-m-d");
        //valida los datos obtenidos en el reques si pasa la validacion continua caso contrario devuelve errores a la vista
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
        //crea un nuevo usuario con los parametros enviados desde la vista
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;
        $usuario->numero = $request->numero;
        $usuario->ciudad = $request->ciudad;
        $usuario->fecha_nacimiento = $request->fecha;
        $usuario->password = $request->password;
        //encripta el password del usuario y lo guarda en la base de datos
        $usuario->encriptarPassword();
        $usuario->save();
        //redirecciona al index de usuarios
        return redirect()->route('usuarios');
    }
    //actualiza la informacion de un usuario
    public function update(Request $request)
    {
        //verifica que contenga el parametro id
        if ($request->id) {
            //obtiene la fecha hace 18 años
            $dt = new Carbon();
            $before = $dt->subYears(18)->format("Y-m-d");
            //valida los datos obtenidos en el reques si pasa la validacion continua caso contrario devuelve errores a la vista
            $request->validate([
                'nombre' => 'required|max:100',
                'fecha' => 'required|date|before_or_equal:' . $before,
                'numero' => 'nullable|size:10',
                'ciudad' => 'required',
            ]);
            //busca al usuario con el id
            $user = User::find($request->user_id);
            //remplaza los parametros cambiados y guarda en la base de datos
            $user->nombre = $request->nombre;
            $user->fecha = $request->fecha;
            $user->numero = $request->numero;
            $user->ciudad = $request->ciudad;
            $user->save();
            //redirecciona al index de usuarios
            return redirect()->route('usuarios');
        }
    }
    //borra el usuario con el id
    public function delete(Request $request)
    {
        //verifica que contenga el parametro id
        if ($request->user_id) {
            //busca el usuario con ese id y lo elimina
            User::find($request->user_id)->delete();
        }
        //redirecciona al index de usuarios
        return redirect()->route('usuarios');
    }
}
