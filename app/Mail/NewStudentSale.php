<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Course;
use App\User;

class NewStudentSale extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $course, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Course $course, $password)
    {
        $this->user     = $user;
        $this->course   = $course;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seus Dados de Acesso!')
                ->view('course.mails.new-student-sale');
    }
}
