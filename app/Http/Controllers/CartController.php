<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttributeModel;
use App\Models\ProductValueModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index(Request $request)
    {
        try {
            $cartItemsJson = $request->cookie('cartItems');
            $cartItems = json_decode($cartItemsJson, true) ?? [];

            $cartDetails = [];
            foreach ($cartItems as $product_id => $quantity) {
                $product = Product::find($product_id);
                if (!$product) {
                    return response()->json(['error' => -1, 'message' => "Not found product"], 400);
                }
                $cartDetails[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'discount_type' => $product->discount_type,
                    'discount_end' => $product->discount_end,
                    'thumbnail' => $product->thumbnail_img,
                    'quantity' => $quantity
                ];
            }
            return response()->json(['error' => 0, 'data' => $cartDetails]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function getAttributeToCart(Request $request)
    {
        try {
            $product_id = $request->product_id;
            if (!$product_id) {
                return response()->json(['error' => -1, 'message' => "Product id is null"], 400);
            }

            $product = Product::find($product_id);
            if (!$product) {
                return response()->json(['error' => -1, 'message' => "Not found product"], 400);
            }
            
            $product_attribute = ProductAttributeModel::where('product_id',$product_id)->get();
            foreach($product_attribute as $attribute){
                $attribute->value = ProductValueModel::where('product_attribute_id',$attribute->id)->get();
            }

            return response()->json(['error' => 0,'attribute'=>$product_attribute ,'message' => "Success add product to cart"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function getProductAttribute(Request $request)
    {
        try {
            $value = $request->attributes_value;
            $first_value = array_values($value)[0];
            $product_value = ProductValueModel::find($first_value);
            $product = Product::find($product_value->product_id);
            $total_money = $product->price;
            $info_value = [];
            foreach($value as $val){
                $product_val = ProductValueModel::find($val);
                $total_money += $product_val->price;
                $info_value[] = $product_val->name;
            }
            $product->total_money = $total_money;
            $product->info_value = $info_value;
            $product->value_id = $value;
           
            return response()->json(['error' => 0,'product'=>$product ,'message' => "Success add product to cart"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function addToCart(Request $request)
    {
        try {
            // dd($request->all());
            $quantity = $request->quantity ?? 1;
            $product_id = $request->product_id;

            if (!$product_id) {
                return response()->json(['error' => -1, 'message' => "Product id is null"], 400);
            }

            $product = Product::find($product_id);

            if (!$product) {
                return response()->json(['error' => -1, 'message' => "Not found product"], 400);
            }

            if ($product->current_stock < $quantity) {
                return response()->json(['error' => -1, 'message' => "Product is out of stock"], 400);
            }

            $cartItems = $request->cookie('cartItems');
            $cartItems = json_decode($cartItems, true);

            if (isset($cartItems[$product_id])) {
                // Product already exists in the cart, update the quantity
                $cartItems[$product_id] = (int)$cartItems[$product_id] + $quantity;
            } else {
                // Product doesn't exist in the cart, add it with the quantity
                $cartItems[$product_id] = $quantity;
            }

            $cartItemsJson = json_encode($cartItems);

            return response()->json(['error' => 0, 'message' => "Success add product to cart"])->cookie('cartItems', $cartItemsJson);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function updateCartQuantity(Request $request)
    {
        try {
            $cartItems = $request->cookie('cartItems');
            $cartItems = json_decode($cartItems, true);

            $product_id = $request->product_id;
            $quantity = $request->quantity;

            if (!$product_id || !$quantity || $quantity <= 0) {
                return response()->json(['error' => -1, 'message' => "Invalid data"], 400);
            }

            $product = Product::find($product_id);

            if ($product->current_stock < $quantity) {
                return response()->json(['error' => -1, 'message' => "Product is out of stock"], 400);
            }

            if (!$cartItems || !isset($cartItems[$product_id])) {
                return response()->json(['error' => -1, 'message' => "Product not found in the cart"], 400);
            }

            $cartItems[$product_id] = (int)$quantity;

            $cartItemsJson = json_encode($cartItems);

            return response()->json(['error' => 0, 'message' => "Cart updated successfully"])->cookie(
                'cartItems',
                $cartItemsJson
            );
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function remove(Request $request, $id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id is null"], 400);
            }

            $cartItems = $request->cookie('cartItems');
            $cartItems = json_decode($cartItems, true);

            if (isset($cartItems[$id])) {
                // Remove the cart item with the specified product_id
                unset($cartItems[$id]);

                $cartItemsJson = json_encode($cartItems);

                return response()->json(['error' => 0, 'message' => "Success remove product from cart"])->cookie('cartItems', $cartItemsJson);
            } else {
                return response()->json(['error' => -1, 'message' => "Product not found in cart"], 400);
            }

            return response()->json(['error' => 0, 'message' => "Success remove address"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}