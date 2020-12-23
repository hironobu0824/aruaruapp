@extends('layouts.layout')

@section('content')
<form action="/themes/{{ $theme->id }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="theme">
        <p>テーマ</p>
        <input type='text' name='theme[theme]' value="{{ $theme->theme }}">
        <p>カテゴリ</p>
        <select name="theme[categories][]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if (in_array($category->id,$theme->categories->pluck('id')->all()))
                        selected
                    @endif
                    >{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="更新">
</form>
<div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
@endsection