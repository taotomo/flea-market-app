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
        
        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                <p>認証メールを再送信しました。メールボックスをご確認ください。</p>
            </div>
        @endif
        
        <a href="http://localhost:8025" target="_blank" class="verification-button">認証はこちらから</a>
        
        <div class="resend-link">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="resend-button">認証メールを再送する</button>
            </form>
        </div>
    </div>
@endsection
