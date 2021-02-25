<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdeaBoughtMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $idea)
    {
        $this->user = $user;
        $this->idea = $idea;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('info@inspiration-o.com')
            ->subject('アイデアが購入されました')
            ->view('emails.idea-bought')
            ->with(['user' => $this->user, 'idea' => $this->idea]);
    }
}
