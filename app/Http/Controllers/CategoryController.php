<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function searchProductsByCategory(Request $request, $slug)
    {
        try {
            $orderBy = $request->query('orderBy');
            $minPrice = $request->query('price_min');
            $maxPrice = $request->query('price_max');

            if (!$slug) {
                toastr()->error('Can not find this slug');
                return back();
            }

            $category = Category::where('slug', $slug)->first();

            if (!$category) {
                toastr()->error('Not find category');
                return back();
            }

            $subCategory = Category::where('parent_id', $category->id)->get();
            $products = $category->products;

            // Retrieve products from the subcategories
            foreach ($subCategory as $subcategory) {
                $products = $products->merge($subcategory->products);
            }

            if ($orderBy) {
                switch ($orderBy) {
                    case 'low_to_high':
                        $products = $products->sortBy('price');
                        break;
                    case 'high_to_low':
                        $products = $products->sortByDesc('price');
                        break;
                }
            }

            if ($minPrice && $maxPrice) {
                $products = $products->whereBetween('price', [$minPrice, $maxPrice]);
            }

            $category->popular = $category->popular + 1;
            $category->save();

            return view('user.category.index')->with(compact('category', 'subCategory', 'products'));
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }
}
