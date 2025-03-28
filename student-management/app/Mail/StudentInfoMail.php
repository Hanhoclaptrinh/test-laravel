<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable; // class co so de gui mail (mailable class)
use Illuminate\Queue\SerializesModels;

class StudentInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;

    public function __construct(Student $student)
    {
        $this->student = $student; // nhan instance cua student model gan cho student
    }

    public function build()
    {
        return $this->subject('Thông tin sinh viên') // tieu de mail
                    ->view('emails.studentinf') // render noi dung mail
                    ->with(['student' => $this->student]); // truyen student vao view
    }
}