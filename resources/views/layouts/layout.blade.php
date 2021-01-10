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
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                        @else
                            <a href="{{ route('login') }}">ログイン</a>
                            @if (Route::has('register'))
                                <a style="padding-left:5px;" href="{{ route('register') }}">新規登録</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div id="register_login_2">
                <div>
                    <a href="#register_login_2" class="menuopen"><i class="fas fa-bars"></i></a>
                    <a href="#close" class="menuclose"><i class="fas fa-times"></i></a>
                </div>
                <ul>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}">{{ Auth::user()->name }}</a></li>
                        @else
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">新規登録</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </header>
        <div class="container">
            <div class="menu1">
                <div class="categories">
                    <p class="menu_heading">カテゴリ</p>
                    <div class="category_list">
                        <ul id="links01" class="side_links">
                            @foreach ($categories as $category)
                                <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="user_ranking">
                    <p class="menu_heading">ユーザー<br>ランキング</p>
                    <div class="user_ranking_list">
                        <ul id="links02" class="side_links">
                            @foreach ($top_users as $index => $user)
                                <li><a href="/user/{{ $user->id }}">{{ $index+1 }}位&ensp;{{ $user->name }}&ensp;({{ $user->posts()->count() }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu2">
                <label class="label1" for="menu_bar01"><i class="fas fa-angle-down"></i>カテゴリ</label>
                <input type="checkbox" id="menu_bar01" class="accordion" />
                <ul id="links01">
                    @foreach ($categories as $category)
                        <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <label class="label1"  for="menu_bar02"><i class="fas fa-angle-down"></i>ユーザランキング</label>
                <input type="checkbox" id="menu_bar02" class="accordion" />
                <ul id="links02">
                    @foreach ($top_users as $index => $user)
                        <li><a href="/user/{{ $user->id }}">{{ $index+1 }}位&ensp;{{ $user->name }}&ensp;(回答数：{{ $user->posts()->count() }})</a></li>
                    @endforeach
                </ul>
            </div>
            <main>
                @yield('content')
            </main>
        </div>
        @yield('js')
    </body>
</html>
