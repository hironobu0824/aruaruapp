@extends('layouts.layout2')

@section('content')
<section>
    <p class="heading">コメントを編集する</p>
    <div class="content">
        <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}/comments/{{ $comment->id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="posts">
                <input type='text' name='comment[body]' value="{{ $comment->body }}">
            </div>
            <input class="submit_button" type="submit" value="更新">
        </form>
        <div class="back">
            <a href='/themes/{{ $theme->id }}/posts/{{ $post->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a></br>
            <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
        </div>
    </div>
</section>
@endsection