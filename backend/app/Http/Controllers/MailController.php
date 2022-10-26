<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use App\Mail\sendVerifyCode;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function sendVerifyCode($email)
    {
        $user = User::where('email', $email)->first();
        $username = $user['firstName'] . ' ' . $user['lastName'];
        $email = $user['email'];
        $characters = '0123456789';
        $psw = '';
        for ($i = 0; $i < 4; $i++) {
            $psw .= $characters[rand(0, strlen($characters) - 1)];
        }
        $body = [
            'username' => $username,
            'code' => $psw
        ];
        if ($user) {
            Mail::to($email)->send(new sendVerifyCode($body)); //file in Mail folder
            $user->verify_code = $psw;
            $user->update();
            return response()->json(['message' => 'success', 'code' => $psw]);
        } else {
            return response()->json(['message' => 'email not found!']);
        }
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Baby-Developer-VCPartIII.com',
            'body' => 'This is for you to clear that you already register in our system.'
        ];
         
        Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}




