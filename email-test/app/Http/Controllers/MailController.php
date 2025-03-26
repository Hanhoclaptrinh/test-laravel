<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User; // Import model User

class MailController extends Controller
{
    public function sendEmail()
    {
        $user = User::find(1); // Giả sử gửi email cho user có ID = 1
    
        if (!$user) {
            return response()->json(['message' => 'User not found!'], 404);
        }
    
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'confirm_url' => route('confirm.email', ['userId' => $user->id]) // Link xác nhận
        ];
    
        dd($data); // Dừng lại và hiển thị dữ liệu
    
        Mail::to($user->email)->send(new TestMail($data));
    
        return response()->json(['message' => 'Email đã được gửi thành công!']);
    }
    


    public function confirmEmail($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->email_verified_at = now(); // Cập nhật trạng thái xác nhận
            $user->save();

            return "Email đã được xác nhận thành công!";
        }

        return "Người dùng không tồn tại!";
    }
}
