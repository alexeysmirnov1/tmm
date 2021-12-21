<?php

namespace App\Providers;

use App\Scopes\ShownScope;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (app()->environment('production')) {
            error_reporting(E_ALL ^ E_NOTICE);
        }
    }

    public function register(): void
    {
//        Article::addGlobalScope(new ShownScope);
//        News::addGlobalScope(new ShownScope);
//        Post::addGlobalScope(new ShownScope);
//        Product::addGlobalScope(new ShownScope);
//        Category::addGlobalScope(new ShownScope);
    }
}
