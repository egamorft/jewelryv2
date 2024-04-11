<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of order.
     */
    public function order(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        if ($request->status && $request->status != 'all') {
            $orders = Orders::query()->with('orderDetails.products')->where('status', $request->status);
        } else {
            $orders = Orders::query()->with('orderDetails.products');
        }

        if ($start && $end) {
            // Convert start and end dates to datetime objects
            $startDateTime = \Carbon\Carbon::createFromFormat('Y-m-d', $start)->startOfDay();
            $endDateTime = \Carbon\Carbon::createFromFormat('Y-m-d', $end)->endOfDay();
        
            $orders->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        $orders = $orders->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('user.authenticated.profile.order')->with(compact('orders'));
    }
}
