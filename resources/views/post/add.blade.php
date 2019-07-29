@extends('layouts.user_base')

@section('title', '新規作成')

@section('header')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('contents')
<div class="col-md-9 mx-auto">
    <div class="modal-content">
        <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white pb-5">
                    {{-- なんか入れる --}}
                </div>
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
                    <form role="form" action="{{ route('post_create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-4">
                            <label>見出しタイトル</label>
                            <div class="input-group input-group-alternative">
                                <input class="form-control form-control-lg" placeholder="タイトルを入力してください" type="text" name="post_title" value="{{ old('post_title') }}">
                            </div>
                        </div>
                        <div id="select_category_form" class="form-group mb-4">
                            <label>カテゴリー</label>
                            <div class="input-group input-group-alternative">
                                <select class="form-control form-control-lg" name="category_name">
                                    @if (count($categories) == 0)
                                        <option value="未カテゴリ">未カテゴリ</option>
                                    @else
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="my-4">
                                <a href="#" class="add_new_category d-block">新しくカテゴリーを追加する</a>
                            </div>
                        </div>
                        <div id="add_category_form" class="form-group mb-4 d-none">
                            <label>カテゴリー</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                                </div>
                                <input class="form-control form-control-lg" placeholder="カテゴリー名を入力してください" type="text">
                            </div>
                            <div class="my-4">
                                <a href="#" class="add_new_category d-block">登録済みのカテゴリーから選択する</a>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label>本文</label>
                            <div class="input-group input-group-alternative">
                                <textarea class="form-control" name="post_text" style="height: 30em;">{{ old('post_text') }}</textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary my-2">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/post_index.js') }}"></script>
@endsection
