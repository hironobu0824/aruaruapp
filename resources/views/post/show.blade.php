@extends('layouts.layout')

@section('content')
<div class="post_title">
    <p>{{ $post->post }}</p>
</div>
<div class="content">
    <div>
        @if($post->is_liked_by_auth_user())
            <a href="{{ route('post.unlike',['theme' => $theme->id, 'post' => $post->id])  }}" class="btn">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
        @else
            <a href="{{ route('post.like',['theme' => $theme->id, 'post' => $post->id])  }}" class="btn">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
        @endif
    </div>
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
@endsection
@section('js')      
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
@endsection