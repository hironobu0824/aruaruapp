@extends('layouts.layout')

@section('content')
<section>
    <p class="heading">テーマ編集する</p>
    <div class="content">
        <form action="/themes/{{ $theme->id }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <input type='text' name='theme[theme]' value="{{ $theme->theme }}">
            <p class="detail">カテゴリ選択（複数選択可、必須）</p>
            <div class="checkbox">
                <input type="hidden" name="theme[categories]" value="">
                @foreach ($categories as $category)
                    <label class="label2">
                        <input type="checkbox" name="theme[categories][]" value="{{ $category->id }}"
                        @if (in_array($category->id,$theme->categories->pluck('id')->all()))
                            checked
                        @endif
                        >{{ $category->name }}
                    </label>
                @endforeach
            </div>
            <input class="submit_button" type="submit" value="更新">
        </form>q
    </div>
</section>
<div class="back">
    <a href='/themes/{{ $theme->id }}'><i class="fas fa-long-arrow-alt-left"></i>前に戻る</a><br/>
    <a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a>
</div>
@endsection