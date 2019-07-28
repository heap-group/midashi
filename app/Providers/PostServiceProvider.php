<?php

namespace MIDASHI\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view::composer('post.index', 'MIDASHI\Http\Composers\PostComposer');

    }
}
