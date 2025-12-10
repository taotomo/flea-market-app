<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COACHTECH')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('styles')
</head>
<body>
    <header>
        <img src="{{ asset('img/logo.png') }}" alt="COACHTECH">
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
