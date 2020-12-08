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
            <p>みんなのあるある</p>
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
            <p class="heading">新たなテーマを投稿する</p>
                <div class="new_theme_post">
                   <form action="/themes" method="POST">
                       {{ csrf_field() }}
                       <input type="text" name="theme[theme]" placeholder="テーマを投稿してね"/>
                       <input type="submit" value="store"/>
                   </form>
                </div>
            <p class="heading">テーマを探す</p>
                <div class="theme_sesrch">
                    
                </div>
            <p class="heading">人気テーマ</p>
                <div class="popular_post_list">
                    @foreach($themes as $theme)
                      <div class="theme">
                          <p class="theme_name"><a href="/themes/{{ $theme->id }}">{{ $theme->theme }}</a></p>
                      </div>
                    @endforeach
                </div>
        </main>
    </body>
</html>
