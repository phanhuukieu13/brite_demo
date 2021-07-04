<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable
{
use Queueable, SerializesModels;
/**
* The user instance.
*
* @var User
*/
private $user;
/**
* Create a new message instance.
*
* @return void
*/
        public function __construct()
    {
        
    }
    /**
    * Build the message.
    *
    * @return $this
    */
        public function build()
    {
        return $this->from('huukieu.304@gmail.com', 'Phan Kiều')
        ->subject('Phan Kiều')
        ->markdown('mail.mail')
        ->with([ 'name'=> 'Kiều',
                // 'userName' => $this->user->name,
        ]);
    }
}
