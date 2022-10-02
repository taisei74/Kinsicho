<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Like;
use App\Genre;

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
    
    public function createShow(Genre $genre)
    {

        // dd($genre->get());
        return view('create')->with(['genres' => $genre->get()]);
    }
    
    public function create(Shop $shop, Request $request)
    {
        $input_shop = $request['shop'];
        $input_genres = $request->genres_array;
        
        $shop->fill($input_shop)->save();
        $shop->genres()->attach($input_genres);
        // dd($genre);
        return redirect('/shop/show/' . $shop->id);
    }
    
    public function edit(Shop $shop,Genre $genre)
    {
        return view('edit')->with(['shop' => $shop, 'genres' => $genre->get()]);
    }
    
    public function update(Shop $shop, Request $request)
    {
        $input_edit = $request['shop'];
        $input_editgenres = $request->genres_array;
        $shop->fill($input_edit)->save();
         $shop->genres()->attach($input_editgenres);
       
        return redirect('/shop/show/' . $shop->id);
    }
    
}
