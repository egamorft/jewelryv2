<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Video';
            $page_menu = 'video';
            $page_sub = null;
            if (isset($request->key_search)) {
                $listData = VideoModel::Where('title', 'like', '%' . $request->get('key_search') . '%')
                    ->orderBy('created_at', 'desc')->paginate(10);
            } else {
                $listData = VideoModel::orderBy('created_at', 'desc')->paginate(10);
            }

            return view('admin.video.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Video';
            $page_menu = 'video';
            $page_sub = 'create';
            return view('admin.video.create', compact('titlePage', 'page_menu', 'page_sub'));
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
            $part = 'upload/video/';
            $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
            $request->file('file')->move($part, $file_name);
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            VideoModel::createVideo($request->all(),$file_name,$display);
            
            return redirect()->route('admin.video.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
                $video = VideoModel::find($id);
                if (empty($video)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
                $titlePage = 'Edit video';
                $page_menu = 'video';
                $page_sub = null;
                return view('admin.video.edit', compact('titlePage', 'page_menu', 'page_sub', 'video'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $video = VideoModel::find($id);
            if (empty($video)){
                return back()->with(['error' => 'Data does not exist']);
            }
            $file_name = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/video/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($video->src);
            }
            if ($request->get('display') == 'on'){
                $display = 1;
            }else{
                $display = 0;
            }
            VideoModel::updateVideo($video, $request->all(), $file_name, $display);
            
            return redirect()->route('admin.video.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $video = VideoModel::find($id);
            if (empty($video)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            unlink($video->src);
            $video->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }
}