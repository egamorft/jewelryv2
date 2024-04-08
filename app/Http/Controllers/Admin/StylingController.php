<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StylingController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Styling';
            $page_menu = 'styling';
            $page_sub = null;
            if (isset($request->key_search)) {
                $listData = StylingModel::Where('title', 'like', '%' . $request->get('key_search') . '%')
                    ->orderBy('created_at', 'desc')->paginate(10);
            } else {
                $listData = StylingModel::orderBy('created_at', 'desc')->paginate(10);
            }
            foreach($listData as $item){
                $item->src = StylingImageModel::where('styling_id',$item->id)->first()->src;
            }

            return view('admin.styling.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Styling';
            $page_menu = 'styling';
            $page_sub = 'create';
            return view('admin.styling.create', compact('titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $styling = StylingModel::createStyling($request->all(),$display);
            $this->add_img_styling($request, $styling->id);
            
            return redirect()->route('admin.styling.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
            $titlePage = 'Edit styling';
            $page_menu = 'styling';
            $page_sub = null;
            $styling = StylingModel::find($id);
                if (empty($styling)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
                $styling_image = StylingImageModel::where('styling_id',$id)->get();
                return view('admin.styling.edit', compact('titlePage', 'page_menu', 'page_sub', 'styling','styling_image'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $styling = StylingModel::find($id);
            if (empty($styling)){
                return back()->with(['error' => 'Data does not exist']);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            StylingModel::updateStyling($styling, $request->all(), $display);
            
            return redirect()->route('admin.banner.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $styling = StylingModel::find($id);
            if (empty($styling)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            $styling_img = StylingImageModel::where('styling_id',$id)->get();
            foreach($styling_img as $image){
                unlink($image->src);
                $image->delete();
            }
            StylingProductModel::where('styling_id',$id)->delete();
            $styling->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }

    public function add_img_styling($request, $styling_id)
    {
        try {
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                foreach ($file as $value) {
                    $image_name = 'upload/styling/' . Str::random(40);
                    $ext = strtolower($value->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $path = 'upload/styling';
                    $value->move($path, $image_full_name);
                    StylingImageModel::createStylingImage($styling_id,$image_full_name);
                }

                // if (isset($related)) {
                //     foreach ($related as $item) {
                //         $prouct_related = new ProductRelatedModel([
                //             'product_id' => $item['product_id'],
                //             'product_infor_id' => $product_infor->id,
                //         ]);
                //         $prouct_related->save();
                //     }
                // }

                return true;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    
    public function add_product_styling($related, $styling_id)
    {
        try {
            if (isset($related)) {
                foreach ($related as $item) {
                    StylingProductModel::createStylingProduct($styling_id,$item['product_id']);
                }
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}