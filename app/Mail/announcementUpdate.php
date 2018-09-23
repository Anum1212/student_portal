<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class announcementUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $announcementMakerName, $announcementTitle, $student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($announcementMakerName, $announcementTitle, $student)
    {
        $this->announcementMakerName = $announcementMakerName;
        $this->announcementTitle = $announcementTitle;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anamamer0@gmail.com', 'UOL Student Portal')
            ->to($this->student->email)
            ->subject('UOL Student Portal Notification')
            ->view('email.announcementUpdate');
    }
}
