<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List banner';
            $page_menu = 'banner';
            $page_sub = null;
            if (isset($request->key_search)) {
                $listData = BannerModel::Where('title', 'like', '%' . $request->get('key_search') . '%')
                    ->orderBy('index', 'asc')->paginate(10);
            } else {
                $listData = BannerModel::orderBy('index', 'asc')->paginate(10);
            }

            return view('admin.banner.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Banner';
            $page_menu = 'banner';
            $page_sub = 'create';
            return view('admin.banner.create', compact('titlePage', 'page_menu', 'page_sub'));
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
            $part = 'upload/banner/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            BannerModel::createBanner($request->all(),$file_name,$display);
            
            return redirect()->route('admin.banner.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
                $banner = BannerModel::find($id);
                if (empty($banner)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
                $titlePage = 'Edit banner';
                $page_menu = 'banner';
                $page_sub = null;
                return view('admin.banner.edit', compact('titlePage', 'page_menu', 'page_sub', 'banner'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $banner = BannerModel::find($id);
            if (empty($banner)){
                return back()->with(['error' => 'Data does not exist']);
            }
            $file_name = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/banner/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($banner->src);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            BannerModel::updateBanner($banner, $request->all(), $file_name, $display);
            
            return redirect()->route('admin.banner.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $banner = BannerModel::find($id);
            if (empty($banner)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            unlink($banner->src);
            $banner->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }
}