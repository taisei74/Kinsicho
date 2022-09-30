<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Like;

class ShopController extends Controller
{
    public function top()
    {
        return view('top');
    }
    
    public function serch()
    {
        return view('index');
    }
    
    
    // public function serch()
    // {
    //     return view('random/serch');
    // }
    
    public function show()
    {
        return view('show/show');
    }
    public function showall(Shop $shop)
    {
        $like=Like::where('shop_id', $shop->id)->where('user_id', auth()->user()->id)->first();
        
        
        return view('show/showall')->with(['shop' => $shop, 'like'=>$like]);
    }
    
    public function createShow()
    {
        return view('create');
    }
    
    public function create(Shop $shop, Request $request)
    {
        $input = $request['shop'];
        $shop->fill($input)->save();
        return redirect('/shop/show/' . $shop->id);
    }
    
    public function edit(Shop $shop)
    {
        return view('edit')->with(['shop' => $shop]);
    }
    
    public function update(Shop $shop, Request $request)
    {
        $input_edit = $request['shop'];
        $shop->fill($input_edit)->save();
        return redirect('/shop/show/' . $shop->id);
    }
    
}
