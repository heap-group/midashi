@extends('layouts.public_base')

@section('contents')
{{-- <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container pt-lg-md">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3"><small>SNSアカウントでログイン</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="{{ route('twitter_oauth') }}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
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
                            <small>メールアドレスでログイン</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input placeholder="Email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for=" customCheckLogin">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a class="text-light" href="{{ route('password.request') }}">
                                <small>
                                {{ __('Forgot Your Password?') }}
                                </small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a class="text-light" href="{{ route('register') }}">
                            <small>
                            {{ __('Create New Account') }}
                            </small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
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
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-3"><small>SNSアカウントでログイン</small></div>
                    <div class="btn-wrapper text-center">
                        <a href="{{ route('twitter_oauth') }}" class="btn btn-neutral btn-icon">
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
                        <small>メールアドレスでログイン</small>
                    </div>
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <div class="alert alert-danger mt-3" role="alert">
                                    <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" type="password" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-3" role="alert">
                                    <span class="alert-inner--text"><strong>エラー:</strong> {{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-muted">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            <small class="text-white">
                            {{ __('Forgot Your Password?') }}
                            </small>
                        </a>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a class="" href="{{ route('register') }}">
                        <small class="text-white">
                        {{ __('Create New Account') }}
                        </small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
