<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Enums\OrderStatus;
use App\Models\User;
use App\Rules\NoSpacesRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of user information.
     */
    public function index()
    {
        $countBeforeDeposit = Orders::where('status', OrderStatus::BEFORE_DEPOSIT)->count();
        $countPrepareDelivery = Orders::where('status', OrderStatus::PREPARE_DELIVERY)->count();
        $countShipping = Orders::where('status', OrderStatus::SHIPPING)->count();
        $countCompleted = Orders::where('status', OrderStatus::COMPLETED)->count();
        $countCancel = Orders::where('status', OrderStatus::CANCEL)->count();
        $countExchange = Orders::where('status', OrderStatus::EXCHANGE)->count();
        $countReturn = Orders::where('status', OrderStatus::RETURN)->count();

        return view('user.authenticated.profile.index')->with(compact(
            'countBeforeDeposit',
            'countPrepareDelivery',
            'countShipping',
            'countCompleted',
            'countCancel',
            'countExchange',
            'countReturn'
        ));
    }

    /**
     * Display and change member .
     */
    public function member()
    {
        return view('user.authenticated.profile.member');
    }

    /**
     * Update user information.
     */
    public function update(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'first_name' => 'required|string|max:30',
                'last_name' => 'required|string|max:30',
                'address' => 'required|string|max:100',
                'region' => 'required|string|max:30',
                'city' => 'required|string|max:30',
                'postcode' => 'required|max:10',
                'country' => 'nullable|max:30',
                'phone' => ['nullable', 'unique:users,phone,' . Auth::user()->id . ',id', 'regex:/^0[1-9][0-9]{8}$/'],
                'gender' => 'required',
                'day' => 'required',
                'month' => 'required',
                'year' => 'required',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $year = $validatedData['year'];
            $month = $validatedData['month'];
            $day = $validatedData['day'];

            $timestamp = strtotime("$year-$month-$day");

            // Format the timestamp as desired
            $formattedBirthday = date("Y-m-d H:i:s", $timestamp);

            $user = User::find(Auth::user()->id);

            $user->update([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'address' => $validatedData['address'],
                'region' => $validatedData['region'],
                'city' => $validatedData['city'],
                'country' => $request->input('country') ?? '',
                'phone' => $request->input('phone') ?? '',
                'postcode' => $validatedData['postcode'],
                'gender' => $validatedData['gender'],
                'birthday' => $formattedBirthday,
            ]);

            toastr()->success("Success update your profile");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }
}
