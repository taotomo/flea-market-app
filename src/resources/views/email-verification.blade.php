@extends('layouts.app')

@section('title', 'メール認証')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/email-verification.css') }}">
@endsection

@section('content')
    <div class="verification-container">
        <div class="verification-message">
            <p>登録していただいたメールアドレスに認証メールを送信しました。</p>
            <p>メール認証を完了してください。</p>
        </div>
        
        <button class="verification-button">認証はこちらから</button>
        
        <div class="resend-link">
            <a href="">認証メールを再送する</a>
        </div>
    </div>
@endsection
