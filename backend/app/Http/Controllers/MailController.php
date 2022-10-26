<?php

namespace App\Http\Controllers;

use App\Mail\sendVerifyCode;
use App\Mail\setUserToAdmine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function setUserToAdmine($email)
    {
        $user = User::where('email', $email)->first();
        $username = $user['firstName'] . ' ' . $user['lastName'];
        $email = $user['email'];
        $body = [
            'username' => $username,
        ];
        if ($user) {
            $user->role = "Admine";
            Mail::to($email)->send(new setUserToAdmine($body)); //file in Mail folder
            $user->update();
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'email not found!']);
        }
    }
}
