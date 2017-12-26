<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReport extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from    = env('APP_EMAIL');

        $subject = "Licences as of ".date('M d, Y');

        return $this->view('emails.send_report')
                    ->from($from)
                    ->attach(storage_path('excel/export/'.$this->data['filename'].'.xls'), [
                        'as'   => $this->data['filename'].'.xls',
                        'mime' => 'application/vnd.ms-excel',
                    ])
                    ->subject($subject)
                    ->with(['report_date' => $this->data['report_date']]);
    }
}
