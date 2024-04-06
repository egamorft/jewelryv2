<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('user.partials.header', function ($view) {
            $topCategories = Category::orderBy('popular', 'desc')->take(5)->get();
            $secondCategories = Category::orderByDesc('popular')->skip(5)->take(5)->get();
            // Top popular categories
            $view->with('topCategories', $topCategories);
            $view->with('secondCategories', $secondCategories);
        });
    }
}
