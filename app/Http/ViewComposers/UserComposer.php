<?php

namespace MIDASHI\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use MIDASHI\Category;
use MIDASHI\Article;

class UserComposer
{
    /**
     * @var String
     */
    protected $user;

    public function __construct(Auth $user)
    {
        $this->user = $user::user();
    }

    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::where('category_create_user', $this->user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        //dd($categories);

        $articles = Article::where('article_create_user', $this->user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        $view->with(['categories' => $categories, 'articles' => $articles]);
    }
}
