<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCompanyNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $website;

    public function __construct($name ,$email,$website)
    {
        $this->name = $name;
        $this->email = $email;
        $this->email = $website;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@admin.com';
        $name = 'Nkosana';
        $subject = 'New Company Added';
        return $this->view('emails.companynotification')
            ->from($address)
            ->subject($subject);
    }
}
