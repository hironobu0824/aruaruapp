@extends('layouts.layout')

@section('content')
<section class="category_theme_list">
　　<p class="heading">{{ $category->name }}</p>
　　<div class="content">
　　    @if (!$category_themes->isEmpty())
            @foreach($category_themes as $theme)
              <div class="theme">
                  <p class="theme_name"><a href="/themes/{{ $theme->id }}">{{ $theme->theme }}</a></p>
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
