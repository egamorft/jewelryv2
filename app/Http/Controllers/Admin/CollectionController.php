<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Collection';
            $page_menu = 'collection';
            $page_sub = 'category-collection';
            $listData = CollectionModel::orderBy('index', 'asc')->paginate(10);

            return view('admin.collection.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Collection';
            $page_menu = 'collection';
            $page_sub = 'category-collection';
            return view('admin.collection.create', compact('titlePage', 'page_menu', 'page_sub'));
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
            $part = 'upload/collection/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $banner = null;
            if ($request->hasFile('banner')){
                $files = $request->file('banner');
                $parts = 'upload/collection/';
                $banner = $parts.Str::random(40). '.'. $files->getClientOriginalExtension();
                $request->file('banner')->move($parts, $banner);
            }
            CollectionModel::createCollection($request->all(),$file_name,$banner,$display);
            
            return redirect()->route('admin.collection.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
                $collection = CollectionModel::find($id);
                if (empty($collection)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
                $titlePage = 'Edit Collection';
                $page_menu = 'collection';
                $page_sub = 'category-collection';
                return view('admin.collection.edit', compact('titlePage', 'page_menu', 'page_sub', 'collection'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $collection = CollectionModel::find($id);
            if (empty($collection)){
                return back()->with(['error' => 'Data does not exist']);
            }
            $file_name = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/collection/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($collection->src);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            $banner = null;
            if ($request->hasFile('banner')){
                $files = $request->file('banner');
                $parts = 'upload/collection/';
                $banner = $parts.Str::random(40). '.'. $files->getClientOriginalExtension();
                $request->file('banner')->move($parts, $banner);
            }
            CollectionModel::updateCollection($collection, $request->all(), $file_name,$banner, $display);
            
            return redirect()->route('admin.collection.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $collection = CollectionModel::find($id);
            if (empty($collection)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            if($collection->banner != null){
                unlink($collection->banner);
            }
            unlink($collection->src);
            $collection->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }
}