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
        </header>
        <div class="container">
            <div class="menu">
                <div class="categories">
                    <p class="menu_heading">カテゴリ</p>
                    <div class="category_list">
                        
                    </div>
                </div>
                <div class="user_ranking">
                    <p class="menu_heading">ユーザー<br>ランキング</p>
                    <div class="user_ranking_list">
                        
                    </div>
                </div>
            </div>
            <main>
                <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="posts">
                        <input type='text' name='post[post]' value="{{ $post->post }}">
                    </div>
                    <input type="submit" value="更新">
                </form>
                <div class="back"><a href='/themes/{{ $theme->id }}/posts/{{ $post->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a></div>
                <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
            </main>
        </div>
    </body>
</html>
