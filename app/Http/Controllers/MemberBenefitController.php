<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberBenefitController extends Controller
{
    public function index()
    {
        return view('user.authenticated.profile.benefit');
    }
}
