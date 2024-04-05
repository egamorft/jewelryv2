<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LiveController extends Controller
{
    /**
     * Display a user ui live
     */
    public function index()
    {
        // Retrieve the JSON data from the file
        $jsonData = file_get_contents(public_path('assets/data/config.json'));
        // Decode the JSON data into a PHP array
        $data = json_decode($jsonData, true);

        $title = null;
        $name = null;
        $content = null;
        $image = null;
        if ($data) {
            // Access the values in the array
            $title = $data['live']['title'];
            $name = $data['live']['name'];
            $content = $data['live']['content'];
            $image = $data['live']['image'];
        }

        $videos = Live::orderBy('id', 'desc')->get();

        return view('user.live.index')->with(compact('title', 'name', 'content', 'image', 'videos'));
    }

    /**
     * Display a content management in live
     */
    public function content()
    {
        // Retrieve the JSON data from the file
        $jsonData = file_get_contents(public_path('assets/data/config.json'));
        // Decode the JSON data into a PHP array
        $data = json_decode($jsonData, true);

        $title = null;
        $name = null;
        $content = null;
        $image = null;
        if ($data) {
            // Access the values in the array
            $title = $data['live']['title'];
            $name = $data['live']['name'];
            $content = $data['live']['content'];
            $image = $data['live']['image'];
        }

        return view('admin.live.live-content')->with(compact('title', 'name', 'content', 'image'));
    }

    /**
     * Store content to json file
     */
    public function saveContent(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'content' => 'required|string|max:50',
                'image' => 'required|image|max:2048'
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData = $validated->validated();
            $image = $request->file('image');
            $imagePath = $image->store('live', 'public');
            $imageFullPath = asset('storage/' . $imagePath);

            // Read the existing data from the config.json file
            $jsonFilePath = public_path('assets/data/config.json');
            $jsonData = file_get_contents($jsonFilePath);
            $data = json_decode($jsonData, true);

            $filePath = parse_url($data['live']['image'], PHP_URL_PATH);
            // Check if the file exists
            if (isset($filePath) && Storage::exists(str_replace('/storage', 'public', $filePath))) {
                Storage::delete(str_replace('/storage', 'public', $filePath));
            }

            // Update the values in the "live" section
            $data['live']['title'] = $validatedData['title'];
            $data['live']['name'] = $validatedData['name'];
            $data['live']['content'] = $validatedData['content'];
            $data['live']['image'] = $imageFullPath;

            // Encode the updated data into JSON
            $jsonData = json_encode($data);

            // Write the updated JSON data back to the config.json file
            file_put_contents($jsonFilePath, $jsonData);

            return response()->json(['error' => 0, 'message' => "Update live content successfully"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function video()
    {
        $videos = Live::orderBy('id', 'desc')->get();

        return view('admin.live.live-videos')->with(compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.live.live-videos-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title' => 'required|string|max:30',
                'view' => 'required|integer|min:0',
                'target_url' => 'required|url',
                'description' => 'nullable|string|max:100',
                'thumbnail' => 'required|image|max:2048'
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = Storage::url($request->file('thumbnail')->store('live', 'public'));
                $validatedData['thumbnail'] = $thumbnailPath;
            }

            $live = Live::create($validatedData);

            if ($live) {
                toastr()->success("Add video successfully");
                return redirect()->route('admin.live.video.list');
            }
            toastr()->error("Please try again!!");
            return back()->withInput();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $video = Live::findOrFail($id);

        return view('admin.live.live-show-video')->with(compact('video'));
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
                'title' => 'required|string|max:30',
                'view' => 'required|integer|min:0',
                'target_url' => 'required|url',
                'description' => 'nullable|string|max:100',
                'thumbnail' => 'nullable|image|max:2048'
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $video = Live::find($id);

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = Storage::url($request->file('thumbnail')->store('live', 'public'));
                $validatedData['thumbnail'] = $thumbnailPath;

                //Delete existed
                if (isset($video->thumbnail) && Storage::exists(str_replace('/storage', 'public', $video->thumbnail))) {
                    Storage::delete(str_replace('/storage', 'public', $video->thumbnail));
                }
            }

            $video->update($validatedData);

            toastr()->success("Update video successfully");
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

            $video = Live::find($id);

            if (!$video) {
                return response()->json(['error' => -1, 'message' => "Not found video"], 400);
            }

            // Check if the file exists
            if (isset($video->thumbnail) && Storage::exists(str_replace('/storage', 'public', $video->thumbnail))) {
                Storage::delete(str_replace('/storage', 'public', $video->thumbnail));
            }

            $video->delete();

            return response()->json(['error' => 0, 'message' => "Success remove video"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}
