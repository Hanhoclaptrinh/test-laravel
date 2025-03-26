<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Http\Controllers\MailController;

Route::get('/send-mail', function () {
    $data = [
        'name' => 'Han',
        'message' => 'Han testing laravel send mail.'
    ];

    Mail::to('bbipenguin.work@gmail.com')->send(new TestMail($data));
    return "Email đã được gửi thành công!";
});

Route::get('/confirm-email/{userId}', [MailController::class, 'confirmEmail'])->name('confirm.email');
