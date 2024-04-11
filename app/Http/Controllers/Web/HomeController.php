<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementModel;
use App\Models\AdvertisementProductModel;
use App\Models\AlbumModel;
use App\Models\BannerModel;
use App\Models\Category;
use App\Models\CollectionModel;
use App\Models\CollectionProductModel;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInterestModel;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $banner = BannerModel::where('display', 1)->orderBy('index', 'asc')->limit(9)->get();
        $video = VideoModel::where('display', 1)->orderBy('created_at', 'desc')->get();
        $styling = StylingModel::where('display', 1)->orderBy('created_at', 'desc')->limit(10)->get();
        foreach ($styling as $item_styling) {
            $item_styling->src = StylingImageModel::where('styling_id', $item_styling->id)->first()->src;
        }
        $advertisement = AdvertisementModel::orderBy('created_at', 'desc')->get();
        foreach ($advertisement as $val) {
            $val->product = AdvertisementProductModel::where('advertisement_id', $val->id)->orderBy('created_at', 'desc')->take(2)->get();
            foreach ($val->product as $item_product) {
                $item_product->info = Product::find($item_product->product_id);
            }
        }
        $collection = CollectionModel::where('display', 1)->orderBy('index', 'asc')->take(2)->get();
        $album = AlbumModel::orderBy('created_at', 'desc')->get();
        //Top 3 category
        $topCategories = Category::orderBy('popular', 'desc')->take(3)->get();
        //Product
        $products = Product::whereHas('categories', function ($query) use ($topCategories) {
            $query->whereIn('category_id', $topCategories->pluck('id'));
        })->get();
        // Retrieve products from the top 3 categories and group them by category
        $productsByCategory = [];
        foreach ($topCategories as $category) {
            $products = Product::where('published', 1)->whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->take(4)->get();
            foreach($products as $item){
                $product_interest = ProductInterestModel::where('product_id',$item->id)->first();
                $item->interest = $product_interest?1:0;
            }
            $productsByCategory[$category->name] = $products;
        }

        return view('user.home.index', compact('banner', 'video', 'topCategories', 'productsByCategory', 'styling', 'advertisement', 'album', 'collection'));
    }

    public function detailCollection($id)
    {
        $data_collection = CollectionModel::where('display', 1)->orderBy('index', 'asc')->get();
        $collection = CollectionModel::find($id);
        $collection_product = CollectionProductModel::where('collection_id', $id)->get();
        foreach ($collection_product as $item) {
            $item->info = Product::find($item->product_id);
            $product_interest = ProductInterestModel::where('product_id',$item->product_id)->first();
            $item->interest = $product_interest?1:0;
        }
        return view('user.collection.index', compact('collection', 'data_collection', 'collection_product'));
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $product->interest = ProductInterestModel::where('product_id',$id)->first()?1:0;
        $category = ProductCategory::where('product_id',$id)->pluck('category_id');
        $arr_id = ProductCategory::whereIn('category_id',$category)->pluck('product_id');
        $related_products = Product::whereIn('id',$arr_id)->where('published',1)->take(8)->get();
        return view('user.product.index',compact('product','related_products'));
    }
}