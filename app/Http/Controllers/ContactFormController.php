<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'comments' => 'required',
        ]);

        // Lấy địa chỉ email nhận (có thể lấy từ .env hoặc một địa chỉ cố định)
        $toEmail = env('MAIL_TO_ADDRESS', 'z73chill@gmail.com');  // Địa chỉ nhận email từ .env hoặc giá trị mặc định

        // Tạo và gửi email
        Mail::to($toEmail)->send(new ContactFormMail(
            $request->name,       // Tên người gửi
            $request->email,      // Email người gửi
            $request->subject,    // Chủ đề
            $request->comments    // Nội dung comment
        ));

        // Trả về phản hồi sau khi gửi email
        return back()->with('success', 'Your message has been sent!');
    }
}
