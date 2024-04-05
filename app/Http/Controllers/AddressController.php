<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display and change member .
     */
    public function address()
    {
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('isDefault', 'desc')->orderBy('id', 'desc')->get();

        return view('user.authenticated.profile.address')->with(compact('addresses'));
    }

    /**
     * Display and register address .
     */
    public function create()
    {
        return view('user.authenticated.profile.register-address');
    }

    /**
     * Show address .
     */
    public function show($id)
    {
        $address = Address::find($id);

        return view('user.authenticated.profile.update-address')->with(compact('address'));
    }

    /**
     * Store new register address .
     */
    public function store(Request $request)
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
                'phone' => ['nullable', 'unique:addresses,phone,' . Auth::user()->id . ',user_id', 'regex:/^0[1-9][0-9]{8}$/'],
                'email' => ['required', 'unique:addresses,email,' . Auth::user()->id . ',user_id', 'max:50'],
                'isDefault' => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $isDefault = isset($validatedData['isDefault']) && $validatedData['isDefault'] == "on" ? 1 : 0;

            if ($isDefault == 1) {
                //Set all address to not default
                $getAddresses = Address::where('user_id', Auth::user()->id)->get();
                foreach ($getAddresses as $add) {
                    $add->isDefault = 0;
                    $add->save();
                }
            }


            Address::create([
                'user_id'   => Auth::user()->id,
                'first_name'     => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'address'    => $validatedData['address'],
                'region'   => $validatedData['region'],
                'city'       => $validatedData['city'],
                'postcode'   => $validatedData['postcode'],
                'country'    => $request->input('country'),
                'phone'    => $request->input('phone'),
                'email'    => $validatedData['email'],
                'isDefault'    => $isDefault
            ]);

            toastr()->success("Success register your address");
            return redirect()->route('profile.delivery.address');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Update register address .
     */
    public function update(Request $request, $id)
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
                'phone' => ['nullable', 'unique:addresses,phone,' . $id . ',id', 'regex:/^0[1-9][0-9]{8}$/'],
                'email' => ['required', 'unique:addresses,email,' . $id . ',id', 'max:50'],
                'isDefault' => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $isDefault = isset($validatedData['isDefault']) && $validatedData['isDefault'] == "on" ? 1 : 0;

            if ($isDefault == 1) {
                //Set all address to not default
                $getAddresses = Address::where('user_id', Auth::user()->id)->get();
                foreach ($getAddresses as $add) {
                    $add->isDefault = 0;
                    $add->save();
                }
            }

            $address = Address::find($id);

            $address->update([
                'first_name'     => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'address'    => $validatedData['address'],
                'region'   => $validatedData['region'],
                'city'       => $validatedData['city'],
                'postcode'   => $validatedData['postcode'],
                'country'    => $request->input('country'),
                'phone'    => $request->input('phone'),
                'email'    => $validatedData['email'],
                'isDefault'    => $isDefault
            ]);

            toastr()->success("Success update your address");
            return redirect()->route('profile.delivery.address');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Update register address .
     */
    public function destroy($id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id is null"], 400);
            }

            $address = Address::find($id);

            if (!$address) {
                return response()->json(['error' => -1, 'message' => "Not found address"], 400);
            }

            // $address->delete();
            return response()->json(['error' => 0, 'message' => "Success remove address"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}
