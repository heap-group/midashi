<!-- Toggler -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
</button>
<!-- Brand -->
<a class="navbar-brand pt-0" href="{{ route('post_index') }}">
    <img alt="MIDASHIロゴ" src="{{ asset('img/midashi-logo-violet.png') }}">
</a>
<!-- User -->
<ul class="nav align-items-center d-md-none">
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('post_add') }}">
            <div class="media align-items-center">
                <span class="">
                    <i class="fas fa-plus text-danger"></i>
                </span>
            </div>
        </a>
    </li>
</ul>
<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
<!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="./index.html">
                    <img alt="MIDASHIロゴ" src="{{ asset('img/midashi-logo-violet.png') }}">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
{{-- laptop --}}
    <div class="mb-3">
        <a href="{{ route('post_add') }}" class="btn btn-block btn-default">
            <i class="ni ni-fat-add text-primary"></i>新規作成
        </a>
    </div>
    <h6 class="navbar-heading text-muted">USER</h6>
    <ul class="navbar-nav">
        <li class="nav-item disabled">
            <span class="nav-link">
                <i class="ni ni-single-02 text-primary"></i>{{ Auth::user()->name }}
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post_index') }}">
            <i class="ni ni-settings text-primary"></i>設定
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ni ni-user-run text-primary"></i>ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <hr class="my-3">
    <h6 class="navbar-heading text-muted">MENU</h6>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post_index') }}">
            <i class="ni ni-chart-pie-35 text-success"></i>ダッシュボード
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post_index') }}">
            <i class="ni ni-bullet-list-67 text-success"></i>見出しリスト
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article_index') }}">
            <i class="ni ni-bullet-list-67 text-success"></i>記事リスト
            </a>
        </li>
    </ul>
    <hr class="my-3">
    <h6 class="navbar-heading text-muted">Categories</h6>
    <ul class="navbar-nav">
        @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post_category_find', ['id' => $category->id]) }}">
                <i class="ni ni-tag text-info"></i>{{ $category->category_name }}
                </a>
            </li>
        @endforeach
    </ul>
    <hr class="my-3">
    <h6 class="navbar-heading text-muted">Articles</h6>
    <ul class="navbar-nav mb-md-3">
        @foreach ($articles as $article)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article_detail', ['id' => $article->id]) }}">
                <i class="ni ni-book-bookmark text-warning"></i>{{ $article->article_title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
