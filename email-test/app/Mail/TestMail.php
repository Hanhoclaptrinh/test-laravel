<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Biến chứa dữ liệu email

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Xác nhận Email')
                    ->view('emails.confirm')
                    ->with([
                        'name' => $this->data['name'] ?? 'Người dùng', // Tránh lỗi nếu name chưa có
                        'confirm_url' => $this->data['confirm_url'] ?? '#' // Tránh lỗi nếu confirm_url chưa có
                    ]);
    }
}

