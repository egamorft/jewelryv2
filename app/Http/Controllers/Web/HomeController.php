<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.home.index');
    }

    public function category()
    {
        return view('user.category.index');
    }

    public function styling()
    {
        return view('user.styling.index');
    }

    public function detailStyling()
    {
        return view('user.styling.detail');
    }

    public function detailProduct()
    {
        return view('user.product.index');
    }

    public function order()
    {
        return view('user.order.index');
    }
}
