<?php

namespace MIDASHI\Http\Controllers;

use MIDASHI\Post;
use MIDASHI\Category;
use MIDASHI\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Provider\es_ES\Person;
use MIDASHI\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * 投稿の一覧表示
     */
    public function index()
    {
        //ログインユーザー情報取得
        $user = Auth::user();
        //ログインユーザーの投稿を取得
        $items = Post::where('post_create_user', $user->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        // $categories = Category::where('category_create_user', $user->id)
        //     ->orderBy('created_at', 'asc')
        //     ->get();

        // $articles = Article::where('article_create_user', $user->id)
        //     ->orderBy('created_at', 'asc')
        //     ->get();

        $setView = [
            'items' => $items,
        ];

        return view('post.index', $setView);
    }

    /**
     * 投稿の絞り込み
     */
    public function find(Request $request)
    {
        $user = Auth::user();
        $items = Post::where('post_create_user', $user->id)
            ->where('category_id', $request->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(9);
        //dd($items);
        return view('post.find_reslut', ['items' => $items]);
    }

    /**
     * 投稿追加
     */
    public function add()
    {
        $user = Auth::user();

        $categories = Category::where('category_create_user', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('post.add', ['categories' => $categories]);
    }

    /**
     * 投稿の登録
     */
    public function create(PostRequest $request)
    {
        $user = Auth::user();

        $form = $request->all();
        $form['post_create_user'] = $user->id;
        unset($form['_token']);

        $postCategory = [
            'category_name' => $form['category_name'],
            'category_create_user' => $form['post_create_user']
        ];

        $category = new Category();
        if ($postCategory['category_name'] == "") {
            // フォームにカテゴリの選択のない場合
            $postCategory['category_name'] = "未カテゴリ";
            $postCategory['category_create_user'] = $user->id;
        }

        $categoryPrimaryKey = $category::where('category_name', $postCategory['category_name'])
            ->where('category_create_user', $user->id)
            ->orderBy('created_at', 'asc')
            ->first();

        if ($categoryPrimaryKey['id'] == null) {
            // カテゴリー登録
            $category->fill($postCategory)->save();

            // 再取得
            $categoryPrimaryKey = $category::where('category_name', $postCategory['category_name'])
                ->where('category_create_user', $user->id)
                ->orderBy('created_at', 'asc')
                ->first();

            // postsテーブルに投稿カテゴリーIDを追加
            $form['category_id'] = $categoryPrimaryKey['id'];
        } else {
            // postsテーブルに投稿カテゴリーIDを追加
            $form['category_id'] = $categoryPrimaryKey['id'];
        }

        // カテゴリ名削除
        unset($form['category_name']);
        // postsテーブルに登録
        $post = new Post();
        $post->fill($form)->save();

        return redirect('/post');
    }

    /**
     * 投稿の編集
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $post = Post::find($request->id);
        $category = new Category();
        $categories = $category->where('category_create_user', $user->id)->get();
        return view('post.edit', ['form' => $post, 'categories' => $categories]);
    }

    /**
     * 投稿の更新
     */
    public function update(Request $request)
    {
        $post = Post::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/post');
    }

    /**
     * 投稿の削除確認ページ
     */
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        return view('post.delete', ['form' => $post]);
    }

    /**
     * 投稿削除
     */
    public function remove(Request $request)
    {
        $user = Auth::user();

        Post::find($request->id)->delete();

        $categoryCount = Post::where('category_id', $request->category_id)
            ->where('post_create_user', $user->id)
            ->get();

        if ($categoryCount->isEmpty()) {
            Category::find($request->category_id)->delete();
        }

        return redirect('/post');
    }

    // /**
    //  * カテゴリー登録
    //  */
    // private function insertCategory($categoryName) {

    // }

    // /**
    //  * カテゴリー存在チェック
    //  */
    // private function isCategory($categoryId) {
    //     if(!is_null($categoryData)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
