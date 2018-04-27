<?php

namespace App\Mail;

use App\Port;
use App\User;
use App\Country;
use App\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Inquary extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $country;
    public $port;
    public $vehicle;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Country $country, Port $port, Vehicle $vehicle)
    {
        $this->user = $user;
        $this->country = $country;
        $this->port = $port;
        $this->vehicle = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.inquary');
    }
}
