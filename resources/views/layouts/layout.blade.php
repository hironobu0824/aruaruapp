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
            <p class="title">みんなのあるある</p>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <div class="container">
            <div class="menu1">
                <div class="categories">
                    <p class="menu_heading">カテゴリ</p>
                    <div class="category_list">
                        <ul id="links01">
                            @foreach ($categories as $category)
                                <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="user_ranking">
                    <p class="menu_heading">ユーザー<br>ランキング</p>
                    <div class="user_ranking_list">
                        
                    </div>
                </div>
            </div>
            <div class="menu2">
                <label for="menu_bar01"><i class="fas fa-angle-down"></i>カテゴリ</label>
                <input type="checkbox" id="menu_bar01" class="accordion" />
                <ul id="links01">
                    @foreach ($categories as $category)
                        <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <label for="menu_bar02"><i class="fas fa-angle-down"></i>ユーザランキング</label>
                <input type="checkbox" id="menu_bar02" class="accordion" />
                <ul id="links02">
                    <li><a href="">Link01</a></li>
                    <li><a href="">Link02</a></li>
                    <li><a href="">Link03</a></li>
                    <li><a href="">Link04</a></li>
                </ul>
            </div>
            <main>
                @yield('content')
            </main>
        </div>
        @yield('js')
    </body>
</html>
