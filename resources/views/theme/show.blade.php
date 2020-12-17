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
            <div class="menu1">
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
            <div class="menu2">
                <label for="menu_bar01"><i class="fas fa-angle-down"></i>カテゴリ</label>
                <input type="checkbox" id="menu_bar01" class="accordion" />
                <ul id="links01">
                    <li><a href="">Link01</a></li>
                    <li><a href="">Link02</a></li>
                    <li><a href="">Link03</a></li>
                    <li><a href="">Link04</a></li>
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
                <div class="title_box">
                    <div class="theme_title">
                        <p>{{ $theme->theme }}</p>
                    </div>
                    <div class="edit_delete_box">
                        <div class="edit_button">
                            <p><a href="/themes/{{ $theme->id }}/edit"><i class="far fa-edit"></i>edit</a></p>
                        </div>
                        <div class="delete_button">
                            <form action="/themes/{{ $theme->id }}" id="form_delete" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <span class="delete_link" onclick="return deleteTheme(this);"><i class="far fa-trash-alt"></i><input type="submit" style="display:none">delete</span>
                            </form>
                        </div>
                    </div>
                    <div class="category_box">
                        @foreach ($theme->categories as $category)
                            <p class="content__header__categories__item">
                                ＃{{ $category->name }}
                            </p>
                        @endforeach
                    </div>
                </div>
                <section class="new_post">
                    <p class="heading">回答する</p>
                    <div class="content">
                        <form action="/themes/{{ $theme->id }}/posts" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="post[post]" placeholder="テーマを投稿してね"/>
                            <input type="submit" value="store"/>
                        </form>
                    </div>
                </section>
                <section class="posts">
                    <p class="heading">みんなの回答</p>
                    <div class="content">
                        @if (!$theme->posts->isEmpty())
                            @foreach ($posts as $post)
                                <div class="post">
                                    <p class="post_content"><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}">{{ $post->post }}</a></p>
                                </div>
                            @endforeach
                            {{ $posts->links('pagination::semantic-ui') }}
                        @else
                           <p>投稿がありません</p>
                        @endif
                    </div>
                </section>
                <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
            </main>
        </div>
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
