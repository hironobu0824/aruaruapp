<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>みんなのあるある</title>

        <!-- Fonts -->
        <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <header>
            <h2>みんなのあるある</h2>
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
            <div class="posts">
                <p>{{ $post->post }}</p>
            </div>
        </main>
    </body>
</html>
