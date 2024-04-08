<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function searchProductsByCategory(Request $request, $slug)
    {
        try {
            if (!$slug) {
                toastr()->error('Can not find this slug');
                return back();
            }

            $category = Category::where('slug', $slug)->first();

            if (!$category) {
                toastr()->error('Not find category');
                return back();
            }

            dd($category);

        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }
}
