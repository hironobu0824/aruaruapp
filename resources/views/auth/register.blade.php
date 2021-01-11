@extends('layouts.app')

@section('content')
<section>
    <p class="heading2">新規ユーザー登録</p>
    <div class="register_box">
        <form method="POST" class="register_form" action="{{ route('register') }}">
            @csrf
            <p class="register_heading">ニックネーム</p>
            <input class="register_input" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p class="register_heading">Eメールアドレス</p>
            <input class="register_input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p class="register_heading">パスワード<span class="limit_letters">（8文字以上）</span></p>
            <input class="register_input" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p class="register_heading">パスワード<span class="limit_letters">（確認）</span></p>
            <input class="register_input" type="password" name="password_confirmation" required autocomplete="new-password">
            <input class="register_button" type="submit" value="新規ユーザー登録する"/>
        </form>
    </div>
</section>
@endsection
