@extends('layouts.layout')

@section('content')
<section class="new_theme_post">
    <p class="heading">新たなテーマを投稿する</p>
    <div class="content">
       <form action="/themes" method="POST">
           {{ csrf_field() }}
           <input type="text" name="theme[theme]" placeholder="テーマを投稿してね"/>
           <select name="theme[categories][]" multiple>
               @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
           </select>
           <input type="submit" value="store"/>
       </form>
    </div>
</section>
<section class="theme_sesrch">
    <p class="heading">テーマを探す</p>
    <div class="content">
        
    </div>
</section>
<section class="popular_post_list">
    <p class="heading">人気テーマ</p>
    <div class="content">
        @foreach($themes as $theme)
          <div class="theme">
              <p class="theme_name"><a href="/themes/{{ $theme->id }}">{{ $theme->theme }}</a></p>
              
          </div>
        @endforeach
    </div>
</section>
@endsection
