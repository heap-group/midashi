<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

//ダッシュボード
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('ダッシュボード', route('post_index'));
});

//ダッシュボード > 見出し一覧
Breadcrumbs::for('post_index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('見出しリスト', route('post_index'));
});

//ダッシュボード > 見出し一覧 > カテゴリー
Breadcrumbs::for('post_category_find', function ($trail, $post) {
    $trail->parent('post_index');
    $trail->push($post->category['category_name'], route('post_category_find', $post->category['id']));
});

//ダッシュボード > 見出し一覧 > 見出し作成
Breadcrumbs::for('post_add', function ($trail) {
    $trail->parent('post_index');
    $trail->push('見出し新規作成', route('post_create'));
});

//ダッシュボード > 見出し一覧 > 見出しの編集
Breadcrumbs::for('post_edit', function ($trail, $post) {
    $trail->parent('post_index');
    $trail->push($post->post_title, route('post_edit', $post->id));
});

//ダッシュボード > 記事一覧
Breadcrumbs::for('article_index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('記事リスト', route('article_index'));
});

//ダッシュボード > 記事一覧 > 記事詳細
Breadcrumbs::for('article_detail', function ($trail, $article) {
    $trail->parent('article_index');
    $trail->push($article->article_title, route('article_detail', $article->id));
});

//ダッシュボード > 設定
Breadcrumbs::for('setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('設定', url(''));
});
