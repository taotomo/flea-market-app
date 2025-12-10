<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // プロフィール編集画面表示
    public function edit()
    {
        return view('profile-edit');
    }

    // 住所変更画面表示
    public function editAddress()
    {
        return view('address-edit');
    }
}
