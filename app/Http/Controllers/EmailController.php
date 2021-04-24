<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use App\Mail\EmailTest;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

class EmailController extends Controller
{
    public function __construct()
    {
        //verifica que se encuentre logeado
        $this->middleware('auth');
    }
    //muestra todos los emails registrados con su estado
    public function index(){
        //obtiene el email del usuario logeado
        $emails = auth()->user()->emails;
        return view('mails.index',compact('emails'));
    }
    //muestra un formulario para enviar el email con asunto, destinatario, mensaje
    public function create(){
        return view('mails.create');
    }

    //funcion que envia el email con los datos del formulario
    public function store(Request $request){
        //valida asunto, destinatario, mensaje como requeridos
        $request->validate([
            'asunto' => 'required',
            'destinatario' => 'required|email',
            'mensaje' => 'required',
        ]);
        //obtiene el email del usuario logeado
        $email = auth()->user()->email;
        //crea un objeto de tipo email para guardar los datos del request y guardarlos en la tabla emails
        $mensaje = new Email();
        $mensaje->asunto = $request->asunto;
        $mensaje->destinatario = $request->destinatario;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->user_id = auth()->user()->id;
        $mensaje->estado = 0;
        $mensaje->save();
        //manda a la cola de emails para ser enviado al momento de ejecutar el trabajo (job)
        dispatch(new SendEmails($mensaje,$email));
        return redirect()->route('email')->with('info',"Email agregado a la cola de Emails");
    }
}
