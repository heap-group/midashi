<?php

namespace MIDASHI\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MIDASHI\Post;
use MIDASHI\Category;
use MIDASHI\Article;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $items = Article::where('article_create_user', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        $categories = Category::where('category_create_user', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('article.article_index', ['items' => $items, 'categories' => $categories]);
    }

    public function show($id)
    {

        $article = Article::find($id);
        //$categories = Category::find($request->id);
        //dd($article);
        //return view('article.article_detail', ['articles' => $article, 'categories' => $categories]);
        return view('article.article_detail', ['article' => $article]);
    }
    //
    public function marge(Request $request)
    {

        $user = Auth::user();
        $mergeList = $request->mergeList;

        $postInfo = Post::whereIn('id', $mergeList)
            ->where('post_create_user', $user->id)
            ->get();

        $txt = '';
        foreach ($postInfo as $post) {
            $txt .= '<h2>' . $post->post_title . '</h2>';
            $txt .= $post->post_text;
        }

        Article::create([
            'article_title' => $request->article_title,
            'article_text' => $txt,
            'article_create_user' => $user->id,
        ]);

        return redirect('/article');
    }

    public function export(Request $request)
    {
        $article = Article::find($request->article_id);
        $filename = $article->article_title . '.txt';

        $headers = [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ];

        $exportData = '<h1>' .  $filename . '</h1>' . $article->article_text;
        return Response::make($exportData, 200, $headers);
    }

    public function remove(Request $request)
    {
        Article::find($request->id)->delete();
        return redirect('/article');
    }
}
