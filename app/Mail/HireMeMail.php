<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireMeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $TeljesNev;
    public $Email;
    public $Telefon;
    public $Uzenet;



    public function __construct($TeljesNev, $Email, $Telefon, $Uzenet)
    {
        $this->TeljesNev = $TeljesNev;
        $this->Email = $Email;
        if(strpos($Telefon, '36') === 0){
            $this->Telefon = '+' . $Telefon;
        }else if(strpos($Telefon, '06') === 0){
            $this->Telefon = $Telefon;
        }
        $this->Uzenet = $Uzenet;
        $this->from($Email, 'Feladó Neve');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Új Kapcsolat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build(){
        return $this
        ->from($this->Email, $this->Email)
        ->subject('Új Kapcsolat')
        ->markdown('email.contact');
    }
}
