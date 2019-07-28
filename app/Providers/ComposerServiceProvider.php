<?php
namespace MIDASHI\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts/user_base', 'MIDASHI\Http\ViewComposers\UserComposer');
    }
}
