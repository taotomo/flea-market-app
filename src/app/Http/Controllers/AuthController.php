<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ログイン画面表示
    public function Login()
    {
        return view('login');
    }

    // 会員登録画面表示
    public function Register()
    {
        return view('register');
    }

    // メール認証誘導画面表示
    public function EmailVerification()
    {
        return view('email-verification');
    }
}
