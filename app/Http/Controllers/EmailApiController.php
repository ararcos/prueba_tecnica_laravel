<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmailResource;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailApiController extends Controller
{
    //devuelve una lista de emails dependiendo de los parametros enviados en la url (remitente, destinatario, asunto)
    public function show(Request $request){
        //valida si en la url se envio el parametro remitente
        if($request->input('remitente')){
            //busca el usuario con el correo del remitente
            $remitente = User::where('email',$request->input('remitente'))->firstOrFail();
            //busca los emails asignados al usuario anterior 
            //ordenado por fecha de creacion de manera ascendente
            //muestra los numeros de registros 10 por defecto o lo que se envio en el parametro paginate
            $emails = Email::where('user_id',$remitente->id)->orderBy('created_at', 'asc')->paginate($request->input('paginate')?$request->input('paginate'):10)->appends(request()->query());
            //retorna la lista de emails
            return EmailResource::collection($emails);
        }
        //valida si en la url se envio el parametro destinatario
        if($request->input('destinatario')){
            //busca los emails del destinatario 
            //ordenado por fecha de creacion de manera ascendente
            //muestra los numeros de registros 10 por defecto o lo que se envio en el parametro paginate
            $emails = Email::where('destinatario',$request->input('destinatario'))->orderBy('created_at', 'asc')->paginate($request->input('paginate')?$request->input('paginate'):10)->appends(request()->query());
            //retorna la lista de emails
            return EmailResource::collection($emails);
        }
        //valida si en la url se envio el parametro asunto
        if($request->input('asunto')){
            //busca los emails con el asunto especificado
            //ordenado por fecha de creacion de manera ascendente
            //muestra los numeros de registros 10 por defecto o lo que se envio en el parametro paginate
            $emails = Email::where('asunto',$request->input('asunto'))->orderBy('created_at', 'asc')->paginate($request->input('paginate')?$request->input('paginate'):10)->appends(request()->query());
            return EmailResource::collection($emails);
        }
        //busca todos los emails
        //ordenado por fecha de creacion de manera ascendente
        //muestra los numeros de registros 10 por defecto o lo que se envio en el parametro paginate
        $emails = Email::orderBy('created_at', 'asc')->paginate($request->input('paginate')?$request->input('paginate'):10)->appends(request()->query());
        return EmailResource::collection($emails);
    }
}
