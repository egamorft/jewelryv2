<?php

namespace App\Providers;

use App\Models\FooterCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
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
        View::composer(['user.partials.footer'], function ($view) {
            $footerParentCategory = FooterCategory::where('parent_id', 0)->get();

            $result = [];
            foreach ($footerParentCategory as $parentCategory) {
                $footerChildrenCategories = FooterCategory::where('parent_id', $parentCategory->id)->get();

                // Collect the child category data
                $childData = [];
                foreach ($footerChildrenCategories as $childCategory) {
                    $childData[] = [
                        'id' => $childCategory->id,
                        'slug' => $childCategory->slug,
                        'name' => $childCategory->name
                    ];
                }

                // Add the parent category and its child data to the result
                $result[$parentCategory->id] = $childData;
            }

            $view->with('footerParentCategory', $footerParentCategory);
            $view->with('footerChildrenCategories', $result);
        });
    }
}
