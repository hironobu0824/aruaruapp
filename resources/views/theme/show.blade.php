@extends('layouts.layout')

@section('content')
<div class="title_box">
    <div class="theme_title">
        <p>{{ $theme->theme }}</p>
        <p>auther: {{ optional($theme->user)->name }}</p>
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