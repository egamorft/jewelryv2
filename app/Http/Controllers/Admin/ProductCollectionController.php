<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollectionModel;
use App\Models\CollectionProductModel;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCollectionController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Product Collection';
            $page_menu = 'collection';
            $page_sub = 'product-collection';
            $listData = CollectionProductModel::orderBy('created_at', 'desc')->paginate(25);
            foreach($listData as $item){
                $item->product = Product::find($item->product_id);
            }

            return view('admin.collection_product.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Product Collection';
            $page_menu = 'collection';
            $page_sub = 'product-collection';
            $collection = CollectionModel::where('display',1)->get();
            return view('admin.collection_product.create', compact('titlePage', 'page_menu', 'page_sub','collection'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            $related = $request->get('related');
            $this->add_product_collection($related, $request->collection);
            
            return redirect()->route('admin.product-collection.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $collection_product = CollectionProductModel::find($id);
            if (empty($collection_product)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            $collection_product->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }

    public function productSearch(Request $request)
    {
        try {
            $key_search = $request->get('query');
            $products = Product::Where('name', 'LIKE', '%' . $key_search . '%')->paginate(10);
            $view = view('admin.collection_product.item-product', compact('products'))->render();
            return response()->json(['table_data' => $view]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function itemProduct(Request $request)
    {
        try {
            $products = Product::whereIn('id', $request->data)->get();
            $view = view('admin.collection_product.similar-product', compact('products'))->render();
            return response()->json(['table_data' => $view]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function itemDeleteProduct(Request $request)
    {
        try {
            if (isset($request->data)) {
                $products = Product::whereIn('id', $request->data)->get();
                $view = view('admin.collection_product.similar-product', compact('products'))->render();
                return response()->json(['status' => true, 'table_data' => $view]);
            } else {
                return response()->json(['status' => false]);
            }
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
    
    public function add_product_collection($related, $collection_id)
    {
        try {
            if (isset($related)) {
                foreach ($related as $item) {
                    CollectionProductModel::createCollectionProduct($collection_id,$item['product_id']);
                }
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}