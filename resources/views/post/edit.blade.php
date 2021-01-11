@extends('layouts.layout2')

@section('content')
<section>
    <p class="heading">投稿を編集する</p>
    <div class="content">
        <form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="posts">
                <input type='text' name='post[post]' value="{{ $post->post }}">
                <p class="error_message">{{ $errors->first('post.post') }}</p>
            </div>
            <input class="submit_button" type="submit" value="更新">
        </form>
        <div class="back">
            <a href='/themes/{{ $theme->id }}/posts/{{ $post->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
            <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
        </div>
    </div>
</section>
@endsection
