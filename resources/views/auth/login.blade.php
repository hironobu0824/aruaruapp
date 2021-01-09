@extends('layouts.app')

@section('content')
<section>
    <p class="heading2">ログイン</p>
    <div class="login_box">
        <form method="POST" class="login_form" action="{{ route('login') }}">
            @csrf
            <p class="login_heading">Eメールアドレス</p>
            <input type="email" class="login_input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p class="login_heading">パスワード</p>    
            <input id="password" type="password" class="login_input" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            <div class="login_detail">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    ログイン情報を保存する
                </label>
            </div>
            <div class="login_detail">
                <input class="login_button" type="submit" value="ログインする"/>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        パスワードをお忘れですか？
                    </a>
                @endif
            </div>
        </form>
    </div>
</section>
@endsection
