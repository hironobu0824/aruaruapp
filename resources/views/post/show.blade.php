@extends('layouts.layout')

@section('content')
<div class="title_box">
    <p class="post_title">{{ $post->post }}</p>
    <div class="edit_delete_box">
    @if($post->user->name === optional(auth()->user())->name )
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
    @endif
        <div class="like_button">
            @if($post->is_liked_by_auth_user())
                <a href="{{ route('post.unlike',['id' => $post->id])  }}" class="btn">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
            @else
                <a href="{{ route('post.like',['id' => $post->id])  }}" class="btn">いいね<span class="badge">{{ $post->likes->count() }}</span></a>
            @endif
        </div>
    </div>
    <div class="post_explain">
        <p class="post_detail">{{ date('Y/m/d',strtotime($post->created_at)) }}</p>
        <p class="post_detail">by {{ optional($post->user)->name }}</p>
        <p class="post_detail">コメント数：{{ $post->comments()->count() }}</p>
    </div>
</div>
    <section class="comments">
        <p class="heading">コメント<span class="limit_letters">(最大200字)</span></p>
        <div class="content">
            <form class="comment_form" action="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments" method="post">
                {{ csrf_field() }}
                <input type="text" name="comment[body]" placeholder="コメントしてみてね(匿名)" value="{{ old('comment.body') }}"/>
                <p class="error_message">{{ $errors->first('comment.body') }}</p>
                <input type="submit" class="submit_button2" value="送信"/>
            </form>
            <div class="comment_list">
                @if (!$post->comments->isEmpty())
                    @foreach ($comments as $comment)
                        <div class="comment">
                            <p class="comment_text">{{ $comment->body }}</p>
                            <div class="comment_detail">
                                <p>by {{ optional($comment->user)->name }}</p>
                                @if($comment->user->name === optional(auth()->user())->name )
                                    <div class="comment_edit_delete">
                                        <p><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments/{{ $comment->id }}/edit"><i class="far fa-edit"></i>edit</a></p>
                                        <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments/{{ $comment->id }}" id="form_delete_comment" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <span class="delete_link" onclick="return deleteComment(this);"><i class="far fa-trash-alt"></i><input type="submit" style="display:none">delete</span>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="detail">コメントがありません</p>
                @endif
            </div>
            <div class="back">
                <a href='/themes/{{ $theme->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
                <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
            </div>
        </div>
    </section>
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