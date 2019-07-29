@extends('layouts.user_base')

@section('title', $article->article_title)
@section('description', $article->article_title)

@section('side_buttons')
    <div class="mb-3">
        <a href="{{ route('post_add') }}" class="btn btn-block btn-default">
            <i class="ni ni-fat-add text-primary"></i>新規作成
        </a>
    </div>
@endsection

@section('header')
{{ Breadcrumbs::render(Route::currentRouteName(), $article) }}
@endsection

@section('contents')
    <div class="col-md-9 mx-auto">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white">
                        <h5 class="h5 text-light">作成日時 {{ $article->created_at }}</h5>
                        <h1>{{ $article->article_title }}</h1>
                        <hr class="my-1">
                        <div class="float-right">
                            <form action="{{ route('article_export') }}" method="POST" class="d-inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <button type="submit" class="btn btn-link"><i class="fas fa-download"></i> ダウンロード</button>
                            </form>
                            <a href="#" class="remove btn btn-link text-danger d-inline-block" data-remove-id="{{ $article->id }}" data-toggle="modal" data-target="#modal-remove-post">
                                削除
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-muted mb-4">
                            {!! GitDown::parseAndCache($article->article_text) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-remove-post" tabindex="-1" role="dialog" aria-labelledby="modal-remove-post" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">記事の削除</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-5x"></i>
                            <h3 class="heading mt-4">以下の記事を削除します。よろしいですか？</h3>
                            <h2 class="h2 text-white my-2">{{ $article->article_title }}</h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="post_remove_form" action="{{ route('article_delete', ['id' => $article->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $article->id }}">
                            <button type="submit" class="btn btn-white">削除</button>
                        </form>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">キャンセル</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

