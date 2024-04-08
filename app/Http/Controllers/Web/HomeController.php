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
        $styling = StylingModel::where('display',1)->orderBy('created_at','desc')->limit(10)->get();
        foreach($styling as $item_styling){
            $item_styling->src = StylingImageModel::where('styling_id',$item_styling->id)->first()->src;
        }
        $advertisement = AdvertisementModel::orderBy('created_at','desc')->get();
        foreach($advertisement as $val){
            $val->product = AdvertisementProductModel::where('advertisement_id',$val->id)->orderBy('created_at','desc')->take(2)->get();
            foreach($val->product as $item_product){
                $item_product->info = Product::find($item_product->product_id);
            }
        }
        $collection = CollectionModel::where('display',1)->orderBy('index','asc')->take(2)->get();
        $album = AlbumModel::orderBy('created_at','desc')->get();
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

        return view('user.home.index', compact('banner', 'video', 'topCategories', 'productsByCategory','styling','advertisement','album','collection'));
    }

    public function category()
    {
        return view('user.category.index');
    }

    public function styling()
    {
        $styling = StylingModel::where('display',1)->orderBy('created_at','desc')->paginate(20);
        foreach($styling as $item_styling){
            $item_styling->src = StylingImageModel::where('styling_id',$item_styling->id)->first()->src;
        }
        return view('user.styling.index',compact('styling'));
    }

    public function detailStyling($id)
    {   
        $styling = StylingModel::find($id);
        $styling_img = StylingImageModel::where('styling_id',$id)->get();
        $styling_product = StylingProductModel::where('styling_id',$id)->get();
        foreach($styling_product as $item){
            $item->info = Product::find($item->product_id);
        }
        return view('user.styling.detail',compact('styling','styling_img','styling_product'));
    }

    public function detailCollection($id)
    {   
        $data_collection = CollectionModel::where('display',1)->orderBy('index','asc')->get();
        $collection = CollectionModel::find($id);
        $collection_product = CollectionProductModel::where('collection_id',$id)->get();
        foreach($collection_product as $item){
            $item->info = Product::find($item->product_id);
        }
        return view('user.collection.index',compact('collection','data_collection','collection_product'));
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