<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('topUsers', $topUsers = User::withCount('posts')->latest()->limit('5')->get());
        View::share('topPosts', $topPosts = Post::withCount('likes')->latest()->limit('5')->get());
    }
}
