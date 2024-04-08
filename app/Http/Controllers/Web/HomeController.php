<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementModel;
use App\Models\AdvertisementProductModel;
use App\Models\AlbumModel;
use App\Models\BannerModel;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $banner = BannerModel::where('display',1)->orderBy('index','asc')->limit(9)->get();
        $video = VideoModel::where('display',1)->orderBy('created_at','desc')->get();
        $styling = StylingModel::where('display',1)->orderBy('created_at','desc')->limit(10)->get();
        foreach($styling as $item_styling){
            $item_styling->src = StylingImageModel::where('styling_id',$item_styling->id)->first()->src;
        }
        $advertisement = AdvertisementModel::orderBy('created_at','desc')->get();
        foreach($advertisement as $val){
            $val->product = AdvertisementProductModel::where('advertisement_id',$val->id)->orderBy('created_at','desc')->get();
            foreach($val->product as $item_product){
                $item_product->infor = [];
            }
        }
        $album = AlbumModel::orderBy('created_at','desc')->get();
        return view('user.home.index',compact('banner','video','styling','advertisement','album'));
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
            $item->infor =[];
        }
        return view('user.styling.detail',compact('styling','styling_img','styling_product'));
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