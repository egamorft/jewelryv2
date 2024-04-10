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
            $parentCategories = Category::where('parent_id', 0)->orderBy('popular', 'desc')->take(5)->get();

            $result = [];
            foreach ($parentCategories as $parentCategory) {
                $childCategories = Category::where('parent_id', $parentCategory->id)->get();
            
                // Collect the child category data
                $childData = [];
                foreach ($childCategories as $childCategory) {
                    $childData[] = [
                        'id' => $childCategory->id,
                        'slug' => $childCategory->slug,
                        'name' => $childCategory->name,
                    ];
                }
            
                // Add the parent category and its child data to the result
                $result[$parentCategory->id] = $childData;
            }
            
            $view->with('parentCategories', $parentCategories);
            $view->with('childrenCategories', $result);
        });
    }
}
