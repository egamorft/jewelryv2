<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $banner = BannerModel::where('display',1)->orderBy('index','asc')->limit(9)->get();
        $video = VideoModel::where('display',1)->orderBy('created_at','desc')->get();
        return view('user.home.index',compact('banner','video'));
    }

    public function category(){
        return view('user.category.index');
    }

    public function styling(){
        return view('user.styling.index');
    }

    public function detailStyling(){
        return view('user.styling.detail');
    }

    public function live(){
        return view('user.live.index');
    }

    public function detailProduct(){
        return view('user.product.index');
    }

    public function order(){
        return view('user.order.index');
    }
}