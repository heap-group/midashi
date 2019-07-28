@extends('layouts.user_base')

@section('title', '記事リスト')
@section('description', '記事リスト')

@section('side_buttons')
    <div class="mb-3">
        <a href="{{ route('post_add') }}" class="btn btn-block btn-default">
            <i class="ni ni-fat-add text-primary"></i>新規作成
        </a>
    </div>
@endsection

@section('side_category')
    @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post_category_find', ['id' => $category->id]) }}">
                <i class="ni ni-tag text-primary"></i>{{ $category->category_name }}
            </a>
        </li>
    @endforeach
@endsection

@section('header')
{{ Breadcrumbs::render(Route::currentRouteName()) }}
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="float-right">
                <button class="btn btn-lg btn-secondary my-3 float-right">
                    <i class="fas fa-download mr-2"></i>
                    すべてダウンロード
                </button>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('contents')
<div class="col-md-9 mx-auto">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-muted mb-4">
                            @foreach ($items as $item)
                            <div class="">
                                <span class="mr-3">#{{ $loop->iteration }}</span>
                                <a href="{{ route('article_detail', ['id' => $item->id]) }}">
                                    {{ $item->article_title }}
                                </a>
                                <form action="{{ route('article_export') }}" method="POST" class="m-0 p-0 float-right">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="article_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-secondary btn-sm float-right">
                                        <i class="fas fa-download text-primary"></i>
                                    </button>
                                </form>
                            </div>
                            {{-- <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-{{ $item->id }}">Default</button> --}}
                            <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered modal-lg" role="document">
                                    <div class="col-md-12">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-title-default">{{ $item->article_title }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {!! $item->article_text !!}
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('post_edit', ['id' => $item->id]) }}" class="btn btn-primary">編集</a>
                                                <a href="#" class="remove btn btn-danger" data-remove-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-remove-post">
                                                    削除
                                                </a>
                                                <a href="" class="btn btn-link  ml-auto" data-dismiss="modal">キャンセル</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
