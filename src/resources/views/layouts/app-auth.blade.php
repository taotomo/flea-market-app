<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COACHTECH')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-auth.css') }}">
    @yield('styles')
</head>
<body>
    <header class="auth-header">
        <div class="header-container">
            <div class="header-left">
                <img src="{{ asset('img/logo.png') }}" alt="COACHTECH">
            </div>
            
            <div class="header-center">
                <input type="text" class="search-box" placeholder="なにをお探しですか？">
            </div>
            
            <div class="header-right">
                <a href="" class="header-link">ログアウト</a>
                <a href="{{ route('profile.edit') }}" class="header-link">マイページ</a>
                <a href="" class="sell-button">出品</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
