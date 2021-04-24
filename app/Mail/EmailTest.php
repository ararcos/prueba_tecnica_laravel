<?php

namespace App\Mail;

use App\Models\Email;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailTest extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email;
    public $correo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //constructor de email que recibe el correo del remitente y el objeto email con los parametros(asunto,user_id,mensaje,destinatario)
    public function __construct(Email $email , $correo)
    {
        $this->email = $email;
        $this->subject = $email->asunto;
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->correo)->view('mails.template');
    }
}
