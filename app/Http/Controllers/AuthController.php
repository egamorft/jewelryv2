<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\NoSpacesRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.login');
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
                'email' => 'required|email|unique:users,email',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'password' => ['required', 'min:8', new NoSpacesRule],
                'confirm_password' => ['required', 'same:password']
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'isAdmin' => 0, //Not admin
                'status' => 1, //Active
                'uuid' => Str::uuid()->toString()
            ]);

            if ($user) {
                toastr()->success('Successfully register, now you can login to your account');
                return back();
            }
            toastr()->error("Something went wrong");
            return back()->withInput();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Handle login form
     */
    public function login(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'member_email' => 'required|email|exists:users,email',
                'member_password' => ['required', 'min:8', new NoSpacesRule],
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $email = $validatedData['member_email'];
            $password = $validatedData['member_password'];

            $user = User::where('email', $email)->first();

            if ($user && Hash::check($password, $user->password)) {
                if ($user->status == 1) {
                    Auth::login($user);

                    toastr()->success('Welcome ' . $user->first_name . ' ' . $user->last_name);
                    return redirect()->intended(route('home'));
                } else {
                    toastr()->error("Your account not activate yet");
                    return back()->withInput();
                }
            }

            toastr()->error("Wrong email or password");
            return back()->withInput();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            toastr()->success('Goodbye & Hope to you again');
            return redirect()->route('home');
        }
        toastr()->success('Something when wrong');
        return back();
    }
}
