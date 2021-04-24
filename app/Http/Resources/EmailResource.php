<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // formato json para la api 
        //verifica el estado para imprimir enviado o no 
        // remitente imprime todos los datos de usuario
        return [
            "id" => $this->id,
            "asunto" => $this->asunto,
            "mensaje" => $this->mensaje,
            "destinatario" => $this->destinatario,
            "estado" => $this->estado==1?'Enviado':'No enviado',
            "remitente" => $this->user,
        ];
    }
}
