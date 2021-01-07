@extends('layouts.layout')

@section('content')
<section>
    <p class="heading">投稿を編集する</p>
    <div class="content">
        <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="posts">
                <input type='text' name='post[post]' value="{{ $post->post }}">
            </div>
            <input class="submit_button" type="submit" value="更新">
        </form>
    </div>
</section>
<div class="back">
    <a href='/themes/{{ $theme->id }}/posts/{{ $post->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
    <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
</div>
@endsection
