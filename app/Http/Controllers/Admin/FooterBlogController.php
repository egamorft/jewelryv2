<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FooterBlog;
use App\Models\FooterCategory;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'footer-blog';
        $blogs = FooterBlog::with('categories')->orderBy('id', 'desc')->get();

        return view('admin.footer_blog.index')->with(compact('blogs', 'page_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_menu = 'footer-blog';
        $categories = FooterCategory::where('parent_id', '!=', 0)->get();

        return view('admin.footer_blog.create')->with(compact('categories', 'page_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title' => 'required|string|max:30',
                'category_id' => 'required|numeric|min:0',
                'description' => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $blog = FooterBlog::create($validatedData);

            toastr()->success("Add blog successfully");
            return redirect()->route('admin.footer.blog.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page_menu = 'product';
        $blog = FooterBlog::with('categories')->findOrFail($id);
        $categories = FooterCategory::where('parent_id', '!=', 0)->get();

        return view('admin.footer_blog.edit')->with(compact('blog', 'categories', 'page_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title' => 'required|string|max:30',
                'category_id' => 'required|numeric|min:0',
                'description' => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $blog = FooterBlog::find($id);

            $blog->update($validatedData);

            toastr()->success("Update blog successfully");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id is null"], 400);
            }

            $blog = FooterBlog::find($id);

            if (!$blog) {
                return response()->json(['error' => -1, 'message' => "Not found blog"], 400);
            }
            
            $blog->delete();

            return response()->json(['error' => 0, 'message' => "Success remove blog"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function postShowroom()
    {
        $page_menu = 'post-showroom';
        $post = PostsModel::where('type',1)->first();

        return view('admin.post.index')->with(compact('post', 'page_menu'));
    }

    public function saveShowroom(Request $request)
    {
        if($request->post_id){
            $post = PostsModel::find($request->post_id);
            $post->title = $request->title;
            $post->describe = $request->describe;
            $post->content = $request->content;
            $post->save();
        }else{
            $post = new PostsModel([
                'title'=>$request->title,
                'describe'=>$request->describe,
                'content'=>$request->content,
                'type'=>1,
            ]);
            $post->save();
        }

        toastr()->success("Update post successfully");
        return back();
    }

    public function postBrand()
    {
        $page_menu = 'post-brand';
        $post = PostsModel::where('type',2)->first();

        return view('admin.post.brand')->with(compact('post', 'page_menu'));
    }

    public function saveBrand(Request $request)
    {
        if($request->post_id){
            $post = PostsModel::find($request->post_id);
            $post->title = $request->title;
            $post->describe = $request->describe;
            $post->content = $request->content;
            $post->save();
        }else{
            $post = new PostsModel([
                'title'=>$request->title,
                'describe'=>$request->describe,
                'content'=>$request->content,
                'type'=>2,
            ]);
            $post->save();
        }

        toastr()->success("Update post successfully");
        return back();
    }
}