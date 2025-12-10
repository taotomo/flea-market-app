@extends('layouts.app')

@section('title', '会員登録')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <h1 class="register-title">会員登録</h1>
        
        <form action="" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">確認用パスワード</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="register-button">登録する</button>
        </form>
        
        <!-- ログインページへのリンク(Laravelのルート名を使ってURLを生成し、web.phpで定義した ->name('login') を参照) -->
        <div class="login-link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </div>
@endsection
