<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>みんなのあるある</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <header>
            <h2>みんなのあるある</h2>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <div class="menu">
            <div class="categories">
                <p>カテゴリ</p>
                <div class="category_list">
                    
                </div>
            </div>
            <div class="user_ranking">
                <p>ユーザーランキング</p>
                <div class="user_ranking_list">
                    
                </div>
            </div>
        </div>
        <main>
            <div class="title">
                <p>{{ $theme->theme }}</p>
            </div>
            <div class="posts">
                @if (isset( $posts ))
                    @foreach ($posts as $post)
                        <div class="post">
                            <p class="post_content"></p>
                            <p class="user_name"></p>
                            <p class="likes">
                                
                            </p>
                            <p class="">
                                
                            </p>
                        </div>
                    @endforeach
                @else
                   <p>投稿がありません</p>
                @endif
            </div>
        </main>
    </body>
</html>
