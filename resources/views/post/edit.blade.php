@extends('layouts.user_base')

@section('title', '投稿編集')

@section('header')
    {{ Breadcrumbs::render('post_edit', $form) }}
@endsection

@section('contents')
<div class="col-md-9 mx-auto">
    <div class="modal-content">
        <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white">
                    見出しの編集
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" action="{{ route('post_update', ['id' => $form->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-4">
                                <label>見出しタイトル</label>
                            <div class="input-group input-group-alternative">
                                <input class="form-control form-control-lg" type="text" name="post_title" value="{{ $form->post_title }}">
                            </div>
                        </div>
                        <div id="select_category_form" class="form-group mb-4">
                            <label>カテゴリー</label>
                            <div class="input-group input-group-alternative">
                                <select class="form-control form-control-lg" name="category_id">
                                    @foreach ($categories as $category)
                                        @if ($form->category['category_name'] == $category->category_name)
                                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <textarea id="editor" class="form-control" name="post_text">{{ $form->post_text }}</textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary my-2">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
