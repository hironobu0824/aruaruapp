@extends('layouts.app')

@section('content')
<div class="card-body">
    <!--@if (session('status'))-->
    <!--    <div class="alert alert-success" role="alert">-->
    <!--        {{ session('status') }}-->
    <!--    </div>-->
    <!--@endif-->
    <p class="heading2">ユーザー情報</p>
    <div class="content">
        <p class="user_data_detail">ニックネーム：{{ $user->name }}</p>
        <p class="user_data_detail">テーマ投稿数：{{ $user->themes()->count() }}</p>
        <p class="user_data_detail">あるある回答数：{{ $user->posts()->count() }}</p>
        <p class="user_data_detail">{{ date('Y/m/d',strtotime($user->created_at)) }}から「みんなのあるある」を利用しています</p>
    </div>
    <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
</div>
@endsection
