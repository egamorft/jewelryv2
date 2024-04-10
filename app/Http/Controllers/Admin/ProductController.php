<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeModel;
use App\Models\ProductCategory;
use App\Models\ProductValueModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'product';
        $page_sub = null;
        $products = Product::orderBy('published', 'desc')->orderBy('id', 'desc')->get();

        return view('admin.product.index')->with(compact('products','page_menu','page_sub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_menu = 'product';
        $page_sub = null;
        $categories = Category::all();

        return view('admin.product.create')->with(compact('categories','page_menu','page_sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'price' => 'required|numeric|min:0',
                'current_stock' => 'required|numeric|min:0',
                'min_qty' => 'required|numeric|min:1',
                'discount' => 'required|numeric|min:0',
                'discount_type' => 'required|in:amount,percent',
                'discount_end' => 'required|after:now',
                'installment' => 'nullable',
                'delivery_n_notice' => 'nullable',
                'spec_n_details' => 'nullable',
                'exchange' => 'nullable',
                'photos.*' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'thumbnail_img' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'published' => 'nullable',
                'information' => 'required',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $validatedData['installment'] = 0;
            if ($request->input('installment') == '1') {
                $validatedData['installment'] = 1;
            }

            $validatedData['published'] = 0;
            if ($request->input('published') == '1') {
                $validatedData['published'] = 1;
            }

            if ($request->hasFile('thumbnail_img')) {
                $thumbnailPath = Storage::url($request->file('thumbnail_img')->store('product', 'public'));
                $validatedData['thumbnail_img'] = $thumbnailPath;
            }

            $storedPhotos = [];
            if ($request->hasFile('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    $thumbnailPath = Storage::url($photo->store('product', 'public'));
                    $storedPhotos[] = $thumbnailPath;
                }
            }
            $validatedData['photos'] = json_encode($storedPhotos);

            $product = Product::create($validatedData);

            //Categories handle
            $categories = $request->categories;
            if ($categories) {
                $product->categories()->sync($categories);
            }
            $attribute = $request->get('variant');
            $this->add_and_update_attribute_product($attribute, $product);

            toastr()->success("Add product successfully");
            return redirect()->route('admin.product.index');
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
        $page_sub = null;
        $product = Product::with('categories')->findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $product->categories->pluck('id')->toArray();
        $product_attribute = ProductAttributeModel::where('product_id',$id)->get();

        return view('admin.product.edit')->with(compact('product', 'categories', 'selectedCategories','page_menu','page_sub','product_attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'price' => 'required|numeric|min:0',
                'current_stock' => 'required|numeric|min:0',
                'min_qty' => 'required|numeric|min:1',
                'discount' => 'required|numeric|min:0',
                'discount_type' => 'required|in:amount,percent',
                'discount_end' => 'required|after:now',
                'installment' => 'nullable',
                'delivery_n_notice' => 'nullable',
                'spec_n_details' => 'nullable',
                'exchange' => 'nullable',
                'photos.*' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'thumbnail_img' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'published' => 'nullable'
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $product = Product::find($id);

            if (!$product) {
                toastr()->error("Not found product");
                return back();
            }

            $validatedData['installment'] = 0;
            if ($request->input('installment') == '1') {
                $validatedData['installment'] = 1;
            }

            $validatedData['published'] = 0;
            if ($request->input('published') == '1') {
                $validatedData['published'] = 1;
            }

            if ($request->hasFile('thumbnail_img')) {
                $thumbnailPath = Storage::url($request->file('thumbnail_img')->store('product', 'public'));
                $validatedData['thumbnail_img'] = $thumbnailPath;

                //Delete existed
                if (isset($product->thumbnail_img) && Storage::exists(str_replace('/storage', 'public', $product->thumbnail_img))) {
                    Storage::delete(str_replace('/storage', 'public', $product->thumbnail_img));
                }
            }

            $storedPhotos = [];
            if ($request->hasFile('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    $thumbnailPath = Storage::url($photo->store('product', 'public'));
                    $storedPhotos[] = $thumbnailPath;
                }

                //Delete existed
                $photos = json_decode($product->photos);
                if (!empty($photos)) {
                    foreach ($photos as $photo) {
                        if (Storage::exists(str_replace('/storage', 'public', $photo))) {
                            Storage::delete(str_replace('/storage', 'public', $photo));
                        }
                    }
                }
                $validatedData['photos'] = json_encode($storedPhotos);
            }

            $product->update($validatedData);

            //Categories handle
            $categories = $request->categories;
            if ($categories) {
                $product->categories()->sync($categories);
            }
            $attribute = $request->get('variant');
            $this->add_and_update_attribute_product($attribute, $product);

            toastr()->success("Update product successfully");
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

            $product = Product::find($id);

            if (!$product) {
                return response()->json(['error' => -1, 'message' => "Not found product"], 400);
            }

            $product->delete();

            return response()->json(['error' => 0, 'message' => "Success remove product"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function add_and_update_attribute_product($data_attribute, $product)
    {
        foreach ($data_attribute as $value) {
            if (isset($value['attribute_id'])) {
                $product_attribute = ProductAttributeModel::find($value['attribute_id']);
                $product_attribute->product_id = $product->id;
                $product_attribute->name = $value['name'];
                $product_attribute->save();
            } else {
                $product_attribute = new ProductAttributeModel([
                    'product_id' => $product->id,
                    'name' => $value['name']
                ]);
                $product_attribute->save();
            }
            if (count($value['data'])) {
                foreach ($value['data'] as $item) {
                    if (isset($item['value_id'])) {
                        $product_value = ProductValueModel::find($item['value_id']);
                        $product_value->name = $item['name'];
                        $product_value->current_stock = isset($item['current_stock']) ? $item['current_stock'] : 0;
                        $product_value->price = isset($item['cost']) ? $item['cost'] : 0;
                        $product_value->price = isset($item['price']) ? $item['price'] : 0;
                        $product_value->save();
                    } else {
                        $product_value = new ProductValueModel([
                            'product_id' => $product->id,
                            'product_attribute_id' => $product_attribute->id,
                            'name' => $item['name'],
                            'current_stock' => isset($item['current_stock']) ? $item['current_stock'] : 0,
                            'cost' => isset($item['cost']) ? $item['cost'] : 0,
                            'price' => isset($item['price']) ? $item['price'] : 0,
                        ]);
                        $product_value->save();
                    }
                }
            }
        }
        return true;
    }

    public function attributeType(Request $request)
    {
        $count = $request->get('count');
        $view = view('admin.product.attribute-type', compact('count'))->render();
        return \response()->json(['html' => $view, 'count' => $count]);
    }

    public function attributeName(Request $request)
    {
        $count = $request->get('count');
        $index = $request->get('index');
        $view = view('admin.product.attribute-name', compact('count', 'index'))->render();
        return \response()->json(['html' => $view]);
    }

    public function deleteType($id)
    {
        try {
            $product_attribute = ProductAttributeModel::find($id);
            ProductValueModel::where('product_attribute_id', $id)->delete();
            $product_attribute->delete();
            toastr()->success("Deleted data successfully");
            return back();
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function deleteName($id)
    {
        try {
            $product_value = ProductValueModel::find($id);
            $product_value->delete();
            toastr()->success("Deleted data successfully");
            return back();
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}