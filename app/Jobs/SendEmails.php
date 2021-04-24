<?php

namespace App\Jobs;

use App\Mail\EmailTest;
use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $mensaje;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Email $mensaje, $email)
    {
        $this->mensaje = $mensaje;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //cambia el estado del mensaje para luego guardarlo en la base de datos
        $this->mensaje->estado= 1;
        //crea una nueva instancia de Email con el mensaje recibido y el email del remitente
        $correo = new EmailTest($this->mensaje,$this->email);
        //envia el email
        Mail::to($this->mensaje->destinatario)->send($correo);
        $this->mensaje->save();
    }
}
