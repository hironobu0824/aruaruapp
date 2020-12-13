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
                <div class="post_title">
                    <p>{{ $post->post }}</p>
                </div>
                <div class="content">
                    <div class="edit_button">
                        <p><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}/edit"><i class="far fa-edit"></i>edit</a></p>
                    </div>
                    <div class="delete_button">
                        <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}" id="form_delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <span class="delete_link" onclick="return deleteTheme(this);"><i class="far fa-trash-alt"></i><input type="submit" style="display:none">delete</span>
                        </form>
                    </div>
                    <div class="comments">
                        <p class="heading">コメント</p>
                    </div>
                </div>
                <div class="back">
                    <a href='/themes/{{ $theme->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
                    <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
                </div>
            </main>
        </div>
        
        <script>
            function deletePost(e){
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
