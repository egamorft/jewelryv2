<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductInterestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestProductController extends Controller
{
    public function index()
    {
        $listData = ProductInterestModel::where('user_id',Auth()->id())->paginate(20);
        $productIds = $listData->pluck('product_id');
        $listProduct = Product::whereIn('id',$productIds)->where('published',1)->get();
        
        return view('user.authenticated.profile.interest',compact('listProduct','listData'));
    }

    public function productInterest(Request $request)
    {
        try {
            $productInterest = ProductInterestModel::where('product_id',$request->product_id)->first();
            if($productInterest){
                $productInterest->delete();
                return response()->json(['status' => 2, 'message' => "Stop caring about successful products"]);
            }
            ProductInterestModel::create([
                'user_id' => Auth()->id(),
                'product_id' => $request->product_id,
            ]);

            return response()->json(['status' => 1, 'message' => "Care about successful products"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}