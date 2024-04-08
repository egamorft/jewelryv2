<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
            $titlePage = 'List Album';
            $page_menu = 'album';
            $page_sub = null;
            $listData = AlbumModel::orderBy('created_at', 'desc')->paginate(10);

            return view('admin.album.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create ()
    {
        try{
            $titlePage = 'Add Album';
            $page_menu = 'album';
            $page_sub = 'create';
            return view('admin.album.create', compact('titlePage', 'page_menu', 'page_sub'));
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store (Request $request)
    {
        try{
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                foreach ($file as $value) {
                    $image_name = 'upload/album/' . Str::random(40);
                    $ext = strtolower($value->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $path = 'upload/album';
                    $value->move($path, $image_full_name);
                    $album = new AlbumModel([
                        'src' =>$image_full_name,
                    ]);
                    $album->save();
                }
            }
            
            return redirect()->route('admin.album.index')->with(['success' => 'New data created successfully']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit ($id)
    {
        try{
                $album = AlbumModel::find($id);
                if (empty($album)) {
                    return back()->with(['error' => 'Data does not exist']);
                }
                $titlePage = 'Edit Album';
                $page_menu = 'album';
                $page_sub = null;
                return view('admin.album.edit', compact('titlePage', 'page_menu', 'page_sub', 'album'));
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update ($id, Request $request)
    {
        try{
            $album = AlbumModel::find($id);
            if (empty($album)){
                return back()->with(['error' => 'Data does not exist']);
            }
            $file_name = null;
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $part = 'upload/album/';
                $file_name = $part.Str::random(40). '.'. $file->getClientOriginalExtension();
                $request->file('file')->move($part, $file_name);
                unlink($album->src);
            }
            $album->src = $file_name??$album->src;
            $album->save();
            
            return redirect()->route('admin.album.index')->with(['success' => 'Updated data successfully']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete ($id)
    {
            $album = AlbumModel::find($id);
            if (empty($album)) {
                return back()->with(['error' => 'Data does not exist']);
            }
            unlink($album->src);
            $album->delete();
            return back()->with(['success' => 'Deleted data successfully']);
    }
}