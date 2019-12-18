<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Course;
use App\User;

class NewSaleStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Course $course)
    {
        $this->user     = $user;
        $this->course   = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("{$this->user->name} Seu novo curso foi liberado!")
                ->view('course.mails.new-sale-student');
    }
}
