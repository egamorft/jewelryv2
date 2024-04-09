<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $defaultAddress = Address::where('isDefault', 1)->where('user_id', Auth::user()->id)->first();
        if (!$defaultAddress) {
            $defaultAddress = Auth::user();
        }

        $cartItems = $request->cookie('cartItems');
        $cartItems = json_decode($cartItems, true);

        if (count($cartItems) < 1) {
            toastr()->error('Your cart is empty now');
            return redirect()->route('home');
        }

        $subTotal = 0;
        $subDiscount = 0;
        $cartDetails = [];
        foreach ($cartItems as $product_id => $quantity) {
            $product = Product::find($product_id);
            if (!$product) {
                toastr()->error("Product not found");
                return redirect()->route('home');
            }
            $subTotal += $product->price * $quantity;
            $salePrice = 0;
            // Is discount available
            if ($product->discount && Carbon::parse($product->discount_end)->isAfter(Carbon::now())) {
                if ($product->discount_type == 'percent') {
                    $salePrice = $product->price - ($product->price * $product->discount / 100);
                    $subDiscount += ($product->price * $product->discount / 100) * $quantity;
                } else {
                    $salePrice = $product->price - $product->discount;
                    $subDiscount += $product->discount * $quantity;
                }
            } else {
                $salePrice = $product->price;
            }
            $cartDetails[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'discount' => $product->discount,
                'discount_type' => $product->discount_type,
                'discount_end' => $product->discount_end,
                'thumbnail' => $product->thumbnail_img,
                'quantity' => $quantity,
                'salePrice' => $salePrice
            ];
        }

        $total = $subTotal - $subDiscount;


        return view('user.order.index')->with(compact('defaultAddress', 'cartDetails', 'subTotal', 'subDiscount', 'total'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
