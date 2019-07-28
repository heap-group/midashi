@extends('layouts.public_base')

@section('contents')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">Welcome!</h1>
                    <p class="text-lead text-light">プログラミング学習を忘れないようにかきとめよう。</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-4"><small>SNSでアカウント登録</small></div>
                    <div class="text-center">
                        <a href="{{ route('twitter_oauth') }}" class="btn btn-neutral btn-icon mr-4">
                            <span class="btn-inner--icon"><img src="../assets/img/icons/common/twitter.svg"></span>
                            <span class="btn-inner--text">Twitter</span>
                        </a>
                        <a href="{{ route('google_oauth') }}" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                            <span class="btn-inner--text">Google</span>
                        </a>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>メールアドレスでアカウント登録</small>
                    </div>
                    <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control @error('name') is-invalid @enderror" placeholder="ユーザー名" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                            <div class="alert alert-danger my-3" role="alert">
                                <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email')
                            <div class="alert alert-danger my-3" role="alert">
                                <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" type="password" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                            <div class="alert alert-danger my-3" role="alert">
                                <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password-confirm" placeholder="パスワードの確認" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="text-muted font-italic"><small>パスワード強度: <span class="text-success font-weight-700">strong</span></small></div>
                        <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                    <label class="custom-control-label" for="customCheckRegister">
                                        <span class="text-muted"><a href="#!">プライバシーポリシー</a>に同意</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">新規登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
