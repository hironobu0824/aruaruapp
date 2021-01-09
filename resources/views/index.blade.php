@extends('layouts.layout')

@section('content')
<section class="new_theme_post">
    <p class="heading">新たなテーマを投稿する</p>
    <div class="content">
       <form action="/themes" method="POST">
           {{ csrf_field() }}
           <input type="text" name="theme[theme]" placeholder="テーマを投稿してね"/>
           <p class="detail">カテゴリ選択（複数選択可、必須）</p>
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
    </div>
</section>
<section class="popular_theme_list">
    <p class="heading">人気テーマ</p>
    <div class="content">
        @if (!$themes->isEmpty())
            @foreach($themes as $theme)
              <div class="theme">
                  <p class="theme_name"><a href="/themes/{{ $theme->id }}">{{ $theme->theme }}</a></p>
                  <div class="theme_index_explain">
                      <p class="theme_detail">{{ date('Y/m/d',strtotime($theme->created_at)) }}</p>
                      <p class="theme_detail">by{{ optional($theme->user)->name }}</p>
                      <p class="theme_detail">投稿数：{{ $theme->posts()->count() }}</p>
                      <div class="category_show">
                        @foreach ($theme->categories as $category)
                            <p class="theme_detail">＃{{ $category->name }}</p>
                        @endforeach
                      </div>
                  </div>
              </div>
            @endforeach
            <div class='paginate'>
                {{ $themes->links('pagination::semantic-ui') }}
            </div>
        @else
            <p>投稿がありません</p>
        @endif
    </div>
</section>
@endsection
