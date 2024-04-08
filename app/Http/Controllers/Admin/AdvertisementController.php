<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementModel;
use App\Models\AdvertisementProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Advertisement';
            $page_menu = 'advertisement';
            $page_sub = null;
            if (isset($request->key_search)) {
                $listData = AdvertisementModel::Where('title', 'like', '%' . $request->get('key_search') . '%')
                    ->orderBy('created_at', 'desc')->paginate(10);
            } else {
                $listData = AdvertisementModel::orderBy('created_at', 'desc')->paginate(10);
            }

            return view('admin.advertisement.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Advertisement';
            $page_menu = 'advertisement';
            $page_sub = 'create';
            return view('admin.advertisement.create', compact('titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            if (!$request->hasFile('file')){
                return back()->with(['error' => 'Please add images']);
            }
            $file = $request->file('file');
            $part = 'upload/advertisement/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            $advertisement = AdvertisementModel::createAdvertisement($request->all(),$file_name);
            $related = $request->get('related');
            $this->add_product_advertisement($related, $advertisement->id);
            
            return redirect()->route('admin.advertisement.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
            $titlePage = 'Edit Advertisement';
            $page_menu = 'advertisement';
            $page_sub = null;
            $advertisement = AdvertisementModel::find($id);
                if (empty($advertisement)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
            $related = AdvertisementProductModel::where('advertisement_id', $id)->get();
            foreach ($related as $item) {
                $item->product = ProductsModel::find($item->product_id);
            }
            return view('admin.advertisement.edit', compact('titlePage', 'page_menu', 'page_sub', 'advertisement','related'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $advertisement = AdvertisementModel::find($id);
            if (empty($advertisement)){
                return back()->with(['error' => 'Data does not exist']);
            }
            $file_name = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/advertisement/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($advertisement->src);
            }
            
            AdvertisementModel::updateAdvertisement($advertisement, $request->all(), $file_name);
            $related = $request->get('related');
            $this->add_product_advertisement($related, $advertisement->id);
            
            return redirect()->route('admin.advertisement.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $advertisement = AdvertisementModel::find($id);
            if (empty($advertisement)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            unlink($advertisement->src);
            AdvertisementProductModel::where('advertisement_id',$id)->delete();
            $advertisement->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }

    public function productSearch(Request $request)
    {
        try {
            $key_search = $request->get('query');
            $products = ProductsModel::Where('name', 'LIKE', '%' . $key_search . '%')->paginate(10);
            $view = view('admin.advertisement.item-product', compact('products'))->render();
            return response()->json(['table_data' => $view]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function itemProduct(Request $request)
    {
        try {
            $products = ProductsModel::whereIn('id', $request->data)->get();
            $view = view('admin.advertisement.similar-product', compact('products'))->render();
            return response()->json(['table_data' => $view]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function itemDeleteProduct(Request $request)
    {
        try {
            if (isset($request->data)) {
                $products = ProductsModel::whereIn('id', $request->data)->get();
                $view = view('admin.advertisement.similar-product', compact('products'))->render();
                return response()->json(['status' => true, 'table_data' => $view]);
            } else {
                return response()->json(['status' => false]);
            }
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function itemDeleteRelated(Request $request)
    {
        try {
            $product_advertisement = AdvertisementProductModel::find($request->id);
            $product_advertisement->delete();
            return response()->json(['status' => true]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
    
    public function add_product_advertisement($related, $advertisement_id)
    {
        try {
            if (isset($related)) {
                foreach ($related as $item) {
                    AdvertisementProductModel::createAdvertisementProduct($advertisement_id,$item['product_id']);
                }
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}