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
            $txt .= '## ' . $post->post_title . "\r\n";
            $txt .= $post->post_text . "\r\n";
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
        $filename = $article->article_title . '.md';

        $headers = [
            'Content-Type' => 'text/md',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ];

        $exportData = $filename . "\r\n" . $article->article_text;
        return Response::make($exportData, 200, $headers);
    }

    public function remove(Request $request)
    {
        Article::find($request->id)->delete();
        return redirect('/article');
    }
}
