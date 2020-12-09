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
            <div class="edit_button">
                <p><a href="/themes/{{ $theme->id }}/edit">edit</a></p>
            </div>
            <form action="/themes/{{ $theme->id }}" id="form_delete" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="submit" style="display:none">
                <p><span onclick="return deleteTheme(this);">delete</span></p>
            </form>
            
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
