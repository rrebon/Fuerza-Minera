<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use phpDocumentor\Reflection\Types\String_;
use App\User;

class Contacto extends Mailable
{
    use Queueable, SerializesModels;
	
    protected $mensaje;
    protected $de;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje, User $user)
    {
        $this->mensaje = $mensaje;
        $this->user = $user;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    	
    	$mensaje = $this->mensaje;
    	$user = $this->user;
        return $this->from('fuerzaminera@fuerzaminera.com.ar')
        			->subject('consulta desde la web')
        			->view('mails.MailContacto', compact(['mensaje','user']));
    }
}
