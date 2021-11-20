<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserSuspensionMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user, $user_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user = User::find($user_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user_suspension',['user' => $this->user]);
    }
}
