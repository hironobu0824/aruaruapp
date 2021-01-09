<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>みんなのあるある</title>
        
        <!-- Fonts -->
        <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
　　　　<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">
　　　　
    </head>
    <body>
        <header>
            <div class="title_button">
                <a href="/"><p class="title">みんなのあるある</p></a>
            </div>
            <div class="register_login">
                @guest
                    <div class="top-right links">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}" style="padding-left:5px;">新規登録</a>
                    @endif
                    </div>
                @else
                    <div class="top-right links">
                        <a href="/home">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <a id="logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </header>
        <div class="container">
            <main>
                @yield('content')
            </main>
        </div>
        @yield('js')
    </body>
</html>