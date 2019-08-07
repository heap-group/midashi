@extends('layouts.user_base')

@section('title', '新規作成')

@section('header')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('contents')
<div class="col-md-12">
    <form role="form" action="{{ route('post_create') }}" method="POST">
        <div class="row">
            <div class="col-md-9">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-left text-muted mb-3">
                                    @if($errors->any())
                                    <div class="error">
                                        @foreach($errors->all() as $message)
                                        <span class="text-danger d-block"><strong>エラー:</strong> {{ $message }}</span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control form-control-lg" placeholder="タイトルを入力してください" type="text" name="post_title" value="{{ old('post_title') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    {{-- TODO: コンポーネント化する --}}
                                    <div class="mb-3">
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="h3">
                                            <i class="fas fa-heading mr-2"></i>h3
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="h4">
                                            <i class="fas fa-heading mr-2"></i>h4
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="bold">
                                            <i class="fas fa-bold mr-2"></i>bold
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="link">
                                            <i class="fas fa-link mr-2"></i>link
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="li">
                                            <i class="fas fa-list mr-2"></i>list
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="quote">
                                            <i class="fas fa-quote-left mr-2"></i>quote
                                        </button>

                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="table">
                                            <i class="fas fa-table mr-2"></i>table
                                        </button>
                                        <button type="button" class="post_parts btn btn-sm btn-primary d-inline-block mt-2" data-code="code">
                                            <i class="fas fa-code mr-2"></i>code
                                        </button>
                                    </div>
                                    <div class="input-group input-group-alternative">
                                        <textarea id="post_textarea" class="form-control" name="post_text" style="height: 30em;">{{ old('post_text') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="form-group mt-3 mb-1">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">作成</button>
                                    </div>
                                </div>
                                <div class="form-group mb-1" id="category_area">
                                    @foreach ($categories as $category)
                                        <div class="custom-control custom-radio mb-3">
                                            @if ($loop->index == 0)
                                                <input name="category_name" class="custom-control-input" id="customRadio{{ $loop->index }}" type="radio" value="{{ $category->category_name }}" checked>
                                            @else
                                                <input name="category_name" class="custom-control-input" id="customRadio{{ $loop->index }}" type="radio" value="{{ $category->category_name }}">
                                            @endif
                                            <label class="custom-control-label" for="customRadio{{ $loop->index }}">{{ $category->category_name }}</label>
                                        </div>
                                    @endforeach
                                    <div class="mt-1">
                                        <a href="#" class="add_category_btn">カテゴリーを追加</a>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div id="add_category_text" class="d-none">
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control" placeholder="新規カテゴリー名" type="text">
                                        </div>
                                        <div class="mt-1">
                                            <a href="#" class="add_category_btn">キャンセル</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/add.js') }}"></script>
@endsection
