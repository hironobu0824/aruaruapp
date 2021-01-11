@extends('layouts.layout')

@section('content')
<section class="new_theme_post">
    <p class="heading">新たなテーマを作成する<span class="limit_letters">(最大100字)</span></p>
    <div class="content">
       <form action="/themes" method="POST">
           {{ csrf_field() }}
           <input type="text" name="theme[theme]" placeholder="テーマを投稿してね" value="{{ old('theme.theme') }}"/>
           <p class="error_message">{{ $errors->first('theme.theme') }}</p>
           <p class="detail">カテゴリ選択（複数選択可）</p>
           <div class="checkbox">
               <input type="hidden" name="theme[categories]" value="">
               @foreach ($categories as $category)
                   <label class="label2">
                       <input type="checkbox" name="theme[categories][]" value="{{ $category->id }}">{{ $category->name }}
                   </label>
               @endforeach
           </div>
           <input class="submit_button" type="submit" value="送信"/>
       </form>
       <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
    </div>
</section>
@endsection
