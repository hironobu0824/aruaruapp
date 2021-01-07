@extends('layouts.layout')

@section('content')
<section class="category_theme_list">
　　<p class="heading">{{ $the_category->name }}</p>
　　<div class="content">
　　    @if (!$category_themes->isEmpty())
            @foreach($category_themes as $theme)
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
                {{ $category_themes->links('pagination::semantic-ui') }}
            </div>
        @else
            <p>投稿がありません</p>
        @endif
　　</div>
　　<div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
</section>
@endsection
