<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of user information.
     */
    public function index()
    {
        return view('user.authenticated.profile.index');
    }

    /**
     * Display a listing of order.
     */
    public function order()
    {
        return view('user.authenticated.profile.order');
    }

    /**
     * Display and change member .
     */
    public function member()
    {
        return view('user.authenticated.profile.member');
    }
}
