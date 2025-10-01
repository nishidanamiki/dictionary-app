<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>辞書アプリ</title>
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                @yield('logo')
            </div>
            <div class="header__nav">
                @guest
                    <a href="{{ route('login') }}" class="header__nav-button">ログイン</a>
                    <a href="{{ route('register') }}" class="header__nav-button">会員登録</a>
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="header__nav-button" type="submit">ログアウト</button>
                    </form>
                @endauth

                <div class="header-nav__item">
                    @yield('nav')
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
