@extends('layouts.app')

@section('content')
<section>
    <p class="heading2">パスワードをリセット</p>
    <div class="content">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label for="email"><p class="password_reset_heading">メールアドレス</p></label>
            <div class="mail_input">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label for="password"><p class="password_reset_heading">パスワード</p></label>
            <div class="mail_input">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label for="password-confirm"><p class="password_reset_heading">パスワード（確認用）</p></label>
            <div class="mail_input">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <input type="submit" class="mail_submit_button" value="パスワードをリセットする"/>
        </form>
    </div>
</section>

@endsection
