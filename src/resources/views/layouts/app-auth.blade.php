<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COACHTECH')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header-auth.css') }}?v={{ time() }}">
    @yield('styles')
</head>
<body>
    <header class="auth-header">
        <div class="header-container">
            <div class="header-left">
                <img src="{{ asset('img/logo.png') }}" alt="COACHTECH">
            </div>
            
            <div class="header-center">
                <form action="{{ route('items.index') }}" method="GET" class="search-form">
                    <input type="text" name="search" class="search-box" placeholder="なにをお探しですか？" value="{{ request('search', '') }}">
                    <input type="hidden" name="tab" value="{{ request('tab', 'all') }}">
                </form>
            </div>
            
            <div class="header-right">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="header-link" style="background: none; border: none; cursor: pointer; color: #fff; font-size: 14px; padding: 0;">ログアウト</button>
                </form>
                <a href="{{ route('mypage') }}" class="header-link">マイページ</a>
                <a href="{{ route('item.create') }}" class="sell-button">出品</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
