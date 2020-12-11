<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>みんなのあるある</title>

        <!-- Fonts -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        
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
            <div class="edit_button">
                <p><a href="/themes/{{ $theme->id }}/edit">edit</a></p>
            </div>
            <form action="/themes/{{ $theme->id }}" id="form_delete" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="submit" style="display:none">
                <p><span onclick="return deleteTheme(this);">delete</span></p>
            </form>
            
            <div class="title">
                <p>{{ $theme->theme }}</p>
            </div>
            <div class="new_post">
                <p>回答する</p>
                <form action="/themes/{{ $theme->id }}/posts" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="post[post]" placeholder="テーマを投稿してね"/>
                    <input type="submit" value="store"/>
                </form>
            </div>
            <div class="posts">
                @if (!$theme->posts->isEmpty())
                    @foreach ($posts as $post)
                        <div class="post">
                            <p class="post_content"><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}">{{ $post->id }}.{{ $post->post }}</a></p>
                        </div>
                    @endforeach
                    {{ $posts->links('pagination::semantic-ui') }}
                @else
                   <p>投稿がありません</p>
                @endif
            </div>
            <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i></a></div>
        </main>
        <script>
            function deleteTheme(e){
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
