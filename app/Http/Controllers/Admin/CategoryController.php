<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('popular', 'desc')->orderBy('id', 'desc')->get();

        return view('admin.category.category-list')->with(compact('categories'));
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
                'slug' => 'required|unique:categories,slug'
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            Category::create($validatedData);

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
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'slug' => 'required|unique:categories,slug,' . $id
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                // return back()->withInput();
                return back();
            }

            $validatedData = $validated->validated();

            $category = Category::find($id);

            $category->update($validatedData);

            toastr()->success("Update category successfully");
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

            $category = Category::find($id);

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
