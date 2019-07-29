@extends('layouts.user_base')

@section('title', '見出しリスト')
@section('description', '見出しリスト')

@section('header')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
    <div class="">
        <div class="pt-1">
            <span class="h6 text-white">作成対象件数</span>
            <p id="merge_cnt" class="h1 text-white d-inline-block align-middle m-1">0</p>
            <button type="button" class="btn btn-sm btn-secondary d-inline-block align-middle" data-toggle="modal" data-target="#exampleModal">
                記事作成
            </button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content bg-secondary">
                    <form id="merge_action" action="{{ route('post_marge') }}" method="POST">
                        <div class="modal-header">
                            <h3>記事作成</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                                    </div>
                                    <input placeholder="タイトルを入力してください" type="text" class="form-control form-control-lg" name="article_title" required autofocus>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div id="merge_list">
                                <p>記事作成対象見出し</p>
                                <ul>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="far fa-paper-plane mr-2"></i>
                                記事作成
                            </button>
                            <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">キャンセル</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contents')
    @foreach ($items as $item)
        <div class="col-xl-3 mb-5 mb-xl-5">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <h6 class="text-muted ls-1 mb-1">最終更新日 {{ $item->updated_at }}</h6>
                    <div class="txt-overflow" style="height: 75px;">
                        <a href="#" class="mb-0" data-title-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-{{ $item->id }}">
                            {{ $item->post_title }}
                        </a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <h5 class="text-muted ls-1 mb-1">
                            <a href="{{ route('post_category_find', ['id' => $item->category['id']]) }}" data-category-id="{{ $item->id }}">
                                <i class="pr-1 ni ni-tag"></i>{{ $item->category['category_name'] }}
                            </a>
                        </h5>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input merge_check" id="customCheck{{ $item->id }}" type="checkbox" value="{{ $item->id }}">
                        <label class="custom-control-label" for="customCheck{{ $item->id }}">#{{ $loop->iteration }}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{-- <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-{{ $item->id }}">Default</button> --}}
                <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-lg" role="document">
                        <div class="col-md-12">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="modal-title-default">{{ $item->post_title }}</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! GitDown::parseAndCache($item->post_text) !!}
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
            </div>
        </div>
    @endforeach
    <div class="d-block">
        <div class="modal fade" id="modal-remove-post" tabindex="-1" role="dialog" aria-labelledby="modal-remove-post" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">見出しの削除</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-5x"></i>
                            <h3 class="heading mt-4">以下の見出しを削除します。よろしいですか？</h3>
                            <h2 id="remove_title" class="h2 text-white my-2"></h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="post_remove_form" action="{{ route('post_remove') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-white">削除</button>
                        </form>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">キャンセル</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-block">
        {{ $items->links() }}
    </div>
@endsection

@section('script')
<script src="{{ asset('js/post_index.js') }}"></script>
@endsection
