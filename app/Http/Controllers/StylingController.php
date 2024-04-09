<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use Illuminate\Http\Request;

class StylingController extends Controller
{
    public function styling()
    {
        $styling = StylingModel::where('display',1)->orderBy('created_at','desc')->paginate(42);
        foreach($styling as $item_styling){
            $item_styling->src = StylingImageModel::where('styling_id',$item_styling->id)->first()->src;
        }
        return view('user.styling.index',compact('styling'));
    }

    public function loadMoreStyling(Request $request)
    {
        $offset = $request->get('offset', 42);
        $styling = StylingModel::where('display',1)->orderBy('created_at','desc')->skip($offset)->take(42)->get();
        foreach($styling as $item){
            $item->src = StylingImageModel::where('styling_id',$item->id)->first()->src;
        }
    
        return response()->json($styling);
    }
    
    public function detailStyling($id)
    {   
        $styling = StylingModel::find($id);
        $styling_img = StylingImageModel::where('styling_id',$id)->get();
        $styling_product = StylingProductModel::where('styling_id',$id)->paginate(21);
        foreach($styling_product as $item){
            $item->info = Product::find($item->product_id);
        }
        return view('user.styling.detail',compact('styling','styling_img','styling_product'));
    }

    public function loadMoreProducts(Request $request)
    {
        $offset = $request->get('offset', 21);
        $styling_products = StylingProductModel::where('styling_id',$request->styling_id)->skip($offset)->take(21)->get();
        foreach($styling_products as $item){
            $item->info = Product::find($item->product_id);
        }
    
        return response()->json($styling_products);
    }

}