<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $titlePage = 'Trang chủ';
        $page_menu = 'dashboard';
        $page_sub = null;
        return view('admin.index', compact('titlePage','page_menu','page_sub'));
    }
}