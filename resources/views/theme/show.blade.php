@extends('layouts.layout')

@section('content')
<div class="title_box">
    <div class="theme_title">
        <p>{{ $theme->theme }}</p>
    </div>
    @if($theme->user->name === optional(auth()->user())->name )
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
    @endif
    <div class="theme_explain">
        <p class="theme_detail">{{ date('Y/m/d',strtotime($theme->created_at)) }}</p>
        <p class="theme_detail">by {{ optional($theme->user)->name }}</p>
        <p class="theme_detail">投稿数：{{ $theme->posts()->count() }}</p>
        <div class="category_show">
            @foreach ($theme->categories as $category)
                <p class="theme_detail">
                    ＃{{ $category->name }}
                </p>
            @endforeach
        </div>
    </div>
</div>
<section class="new_post">
    <p class="heading">回答する<span class="limit_letters">(最大200字)</span></p>
    <div class="content">
        <form  class="post_form" action="/themes/{{ $theme->id }}/posts" method="post">
            {{ csrf_field() }}
            <input type="text" name="post[post]" placeholder="テーマを投稿してね" value="{{ old('post.post') }}"/>
            <p class="error_message">{{ $errors->first('post.post') }}</p>
            <input class="submit_button2" type="submit" value="送信"/>
        </form>
    </div>
</section>
<section class="posts">
    <p class="heading">みんなの回答</p>
    <div class="content">
        @if (!$theme->posts->isEmpty())
            @foreach ($posts as $post)
                <div class="post">
                    <p class="post_name"><a href="/themes/{{ $theme->id }}/posts/{{ $post->id }}">{{ $post->post }}</a></p>
                    <div class="post_index_explain">
                        <p class="post_detail">{{ date('Y/m/d',strtotime($post->created_at)) }}</p>
                        <p class="post_detail">by {{ optional($post->user)->name }}</p>
                        <p class="post_detail">いいね数：{{ $post->likes->count() }}</p>
                        <p class="post_detail">コメント数：{{ $post->comments()->count() }}</p>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                {{ $posts->links('pagination::semantic-ui') }}
            </div>
        @else
           <p>投稿がありません</p>
        @endif
        <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
    </div>
</section>
@endsection

@section('js')
<script>
    function deleteTheme(e){
        'use strict';
        if (confirm('削除すると復元できません。\n本当に削除しますか？')){
            document.getElementById('form_delete').submit();
        }
    }
</script>
@endsection