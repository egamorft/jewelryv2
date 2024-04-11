<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'order';
        $orders = Orders::orderBy('id', 'desc')->get();

        return view('admin.order.index')->with(compact('orders', 'page_menu'));
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
        //
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
        $page_menu = 'order';
        $order = Orders::with('orderDetails.products')->find($id);

        return view('admin.order.edit')->with(compact('page_menu', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'status' => 'required|in:' . implode(',', OrderStatus::getValues())
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData = $validated->validated();

            $status = $validatedData['status'];

            $order = Orders::find($id);
            $order->status = $status;
            $order->save();

            return response()->json(['error' => 0, 'message' => 'Change order status success']);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
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

            $order = Orders::find($id);

            if (!$order) {
                return response()->json(['error' => -1, 'message' => "Not found order"], 400);
            }

            $order->delete();

            return response()->json(['error' => 0, 'message' => "Success remove order"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}
