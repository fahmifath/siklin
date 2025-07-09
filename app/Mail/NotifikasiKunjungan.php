<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiKunjungan extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // data kunjungan, pasien, dll

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Kunjungan')
                    ->view('emails.kunjungan'); // View di resources/views/emails/kunjungan.blade.php
    }
}
