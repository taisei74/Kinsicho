<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
class ShopController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function serch()
    {
        return view('random/serch');
    }
    
    public function show()
    {
        return view('show');
    }
    public function showall(Shop $shop)
    {
        return view('showall')->with(['shop' => $shop]);
    }
}
