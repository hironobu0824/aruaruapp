@extends('layouts.layout')

@section('content')
<form action="/themes/{{ $theme->id }}/posts/{{ $post->id }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="posts">
        <input type='text' name='post[post]' value="{{ $post->post }}">
    </div>
    <input type="submit" value="更新">
</form>
<div class="back"><a href='/themes/{{ $theme->id }}/posts/{{ $post->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a></div>
<div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
@endsection
