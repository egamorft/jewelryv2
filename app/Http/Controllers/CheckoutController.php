<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Address;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductValueModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        foreach ($cartItems as $item) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
            $value_id = $item['value_id'];
    
            $product = Product::find($product_id);
            if (!$product) {
                toastr()->error("Product not found");
                return redirect()->route('home');
            }
            $name_value = '';
            $total_money = 0;
            foreach($value_id as $key => $val_id){
                $product_value = ProductValueModel::find($val_id);
                $total_money += $product_value->price;
                $name_value .= $key == 0 ? $product_value->name : '/'.$product_value->name;
            }
            $salePrice = 0;
           
            if ($product->discount && Carbon::parse($product->discount_end)->isAfter(Carbon::now())) {
                if ($product->discount_type == 'percent') {
                    $salePrice = ($product->price - ($product->price * $product->discount / 100))+$total_money;
                    $subDiscount += ($product->price * $product->discount / 100) * $quantity;
                } else {
                    $salePrice = ($product->price - $product->discount)+$total_money;
                    $subDiscount += $product->discount * $quantity;
                }
            } else {
                $salePrice = $product->price + $total_money;
            }
            $subTotal += $salePrice * $quantity;
            $cartDetails[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'discount' => $product->discount,
                'discount_type' => $product->discount_type,
                'discount_end' => $product->discount_end,
                'thumbnail' => $product->thumbnail_img,
                'quantity' => $quantity,
                'salePrice' => $salePrice,
                'value_id' => $value_id,
                'value_name' => $name_value
            ];
        }

        $total = $subTotal - $subDiscount;


        return view('user.order.index')->with(compact('defaultAddress', 'cartDetails', 'subTotal', 'subDiscount', 'total'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'address' => 'required|string|max:100',
            'region' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'postcode' => 'required|max:10',
            'country' => 'nullable|max:30',
            'phone' => ['nullable', 'regex:/^0[1-9][0-9]{8}$/'],
            'payment_method' => 'required|in:cod,paypal',
            'subtotal' => 'required',
            'discount' => 'required',
            'total' => 'required',
        ]);

        if ($validated->fails()) {
            toastr()->error($validated->errors()->first());
            return back()->withInput();
        }

        $validatedData = $validated->validated();

        $trackingCode = $this->generateTrackingCode();

        $shippingAddress = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'region' => $validatedData['region'],
            'city' => $validatedData['city'],
            'postcode' => $validatedData['postcode'],
            'country' => $validatedData['country'] ?? '',
            'phone' => $validatedData['phone'] ?? '',
        ];

        $shippingAddress = json_encode($shippingAddress);

        try {
            DB::beginTransaction();
            $order = Orders::create([
                'tracking_code' => $trackingCode,
                'user_id' => Auth::user()->id,
                'contact_email' => $validatedData['email'],
                'shipping_address' => $shippingAddress,
                'payment_method' => $validatedData['payment_method'],
                'subtotal' => $validatedData['subtotal'],
                'discount' => $validatedData['discount'],
                'total' => $validatedData['total'],
                'status' => OrderStatus::BEFORE_DEPOSIT,
            ]);

            $cartItems = $request->cookie('cartItems');
            $cartItems = json_decode($cartItems, true);
            
            foreach ($cartItems as $item) {
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];
                $value_ids = $item['value_id'];
                $product = Product::find($product_id);
                if (!$product) {
                    toastr()->error("Product not found");
                    return back();
                }
                $name_value = '';
                $total_money = 0;
                foreach($value_ids as $val_id){
                    $product_value = ProductValueModel::find($val_id);
                    $total_money += $product_value->price;
                    $name_value .= '/'.$product_value->name;
                }
                // Is discount available
                if ($product->discount && Carbon::parse($product->discount_end)->isAfter(Carbon::now())) {
                    if ($product->discount_type == 'percent') {
                        $salePrice = ($product->price - ($product->price * $product->discount / 100))+$total_money;
                    } else {
                        $salePrice = ($product->price - $product->discount)+$total_money;
                    }
                } else {
                    $salePrice = ($product->price)+$total_money;
                }
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'product_name' => $product->name.$name_value,
                    'quantity' => $quantity,
                    'price' => $salePrice
                ]);
            }
            DB::commit();
            //DELETE
            toastr()->success('Order created successfully');
            return redirect()->route('home')->withCookie(cookie()->forget('cartItems'));
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    protected function generateTrackingCode()
    {
        $trackingCode = Str::random(6);

        while (Orders::where('tracking_code', $trackingCode)->exists()) {
            $trackingCode = Str::random(6);
        }

        return $trackingCode;
    }
}