<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\VideoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $banner = BannerModel::where('display', 1)->orderBy('index', 'asc')->limit(9)->get();
        $video = VideoModel::where('display', 1)->orderBy('created_at', 'desc')->get();
        //Top 3 category
        $topCategories = Category::orderBy('popular', 'desc')->take(3)->get();
        //Product
        $products = Product::whereHas('categories', function ($query) use ($topCategories) {
            $query->whereIn('category_id', $topCategories->pluck('id'));
        })->get();
        // Retrieve products from the top 3 categories and group them by category
        $productsByCategory = [];
        foreach ($topCategories as $category) {
            $products = Product::whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->take(4)->get();
            $productsByCategory[$category->name] = $products;
        }

        return view('user.home.index', compact('banner', 'video', 'topCategories', 'productsByCategory'));
    }

    public function category()
    {
        return view('user.category.index');
    }

    public function styling()
    {
        return view('user.styling.index');
    }

    public function detailStyling()
    {
        return view('user.styling.detail');
    }

    public function detailProduct()
    {
        return view('user.product.index');
    }

    public function order()
    {
        return view('user.order.index');
    }
}
