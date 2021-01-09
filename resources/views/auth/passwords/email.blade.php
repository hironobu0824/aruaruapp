@extends('layouts.app')

@section('content')
<section>
    <p class="heading2">パスワードを忘れた方</p>
    <div class="content">
        <p class="password_reset_detail">ユーザー登録時に登録されたメールアドレスを入力してください。</br>
        パスワード再設定ページへのメールをお送りします。</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <!--{{ session('status') }}-->
                メールが送信されました
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email"><p class="password_reset_heading">メールアドレス</p></label>
            <div class="mail_input">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" class="mail_submit_button" value="メールを送信する"/>
        </form>
        <div class="back"><a href='/login'><i class="fas fa-long-arrow-alt-left"></i>ログイン画面に戻る</a></div>
        <div class="back"><a href='/'><i class="fas fa-long-arrow-alt-left"></i>トップに戻る</a></div>
    </div>
</section>
@endsection
