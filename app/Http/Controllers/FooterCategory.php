<?php

namespace App\Http\Controllers;

use App\Models\FooterCategory as ModelsFooterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'footer-category';
        $categories = ModelsFooterCategory::orderBy('parent_id', 'asc')->get();

        return view('admin.footer_category.index')->with(compact('categories', 'page_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'slug' => 'required|unique:categories,slug',
                'parent_id' => 'required|integer'
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $parent_id = $validatedData['parent_id'];

            $category = ModelsFooterCategory::find($parent_id);

            if ($parent_id != 0) {
                if (!$category || $category->parent_id != 0) {
                    toastr()->error("Parent selected is invalid");
                    return back()->withInput();
                }
            }

            ModelsFooterCategory::create($validatedData);

            toastr()->success("Add category successfully");
            return back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'slug' => 'required|unique:categories,slug',
            'parent_id' => 'required|integer'
        ]);

        if ($validated->fails()) {
            toastr()->error($validated->errors()->first());
            return back()->withInput();
        }

        $validatedData = $validated->validated();

        $parent_id = $validatedData['parent_id'];

        $category = ModelsFooterCategory::find($parent_id);

        if ($parent_id != 0) {
            if (!$category || $category->parent_id != 0) {
                toastr()->error("Parent selected is invalid");
                return back()->withInput();
            }
        }

        $cate = ModelsFooterCategory::find($id);
        $cate->update($validatedData);

        toastr()->success("Update category successfully");
        return back();
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

            $category = ModelsFooterCategory::find($id);

            if (!$category) {
                return response()->json(['error' => -1, 'message' => "Not found category"], 400);
            }

            $category->delete();

            return response()->json(['error' => 0, 'message' => "Success remove category"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}