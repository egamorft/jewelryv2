<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestProductController extends Controller
{
    public function index()
    {
        return view('user.authenticated.profile.interest');
    }
}
