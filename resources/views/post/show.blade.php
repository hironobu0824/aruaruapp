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
                            <span class="delete_link" onclick="return deletePost(this);"><i class="far fa-trash-alt"></i><input type="submit" style="display:none">delete</span>
                        </form>
                    </div>
                    <section class="comments">
                        <p class="heading">コメント</p>
                        <div class="content">
                            <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="comment[body]" placeholder="コメントしてみてね"/>
                                <input type="submit" value="store"/>
                            </form>
                            <div class="comment_list">
                                @if (!$post->comments->isEmpty())
                                    @foreach ($comments as $comment)
                                        <div class="comment">
                                            <p>{{ $comment->body }}</p>
                                            <div class="edit_button">
                                                <p><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments/{{ $comment->id }}/edit"><i class="far fa-edit"></i>edit</a></p>
                                            </div>
                                            <div class="delete_button">
                                                <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments/{{ $comment->id }}" id="form_delete_comment" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <span class="delete_link" onclick="return deleteComment(this);"><i class="far fa-trash-alt"></i><input type="submit" style="display:none">delete</span>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>投稿がありません</p>
                                @endif
                            </div>
                        </div>
                    </section>
                    <div class="back">
                        <a href='/themes/{{ $theme->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
                        <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
                    </div>
                </div>
            </main>
        </div>
        
        <script>
            function deletePost(e){
                'use strict';
                if (confirm('このあるあるテーマを削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
            function deleteComment(e){
                'use strict';
                if (confirm('このコメントを削除しますか？')){
                    document.getElementById('form_delete_comment').submit();
                }
            }
        </script>
    </body>
</html>
