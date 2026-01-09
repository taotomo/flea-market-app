@extends('layouts.app')

@section('title', 'ログイン')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <h1 class="login-title">ログイン</h1>
        
        <form action="{{ route('login') }}" method="POST" novalidate>
            @csrf
            
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="login-button">ログインする</button>
        </form>
        
        <div class="register-link">
            <a href="/register">会員登録はこちら</a>
        </div>
    </div>
@endsection
