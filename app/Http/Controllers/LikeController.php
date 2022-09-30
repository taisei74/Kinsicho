<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Shop $shop, Request $request)
    {
        $like=New Like();
        $like->shop_id = $shop->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
        
        // dd($like);
    }
    
    public function unlike(Shop $shop,Request $request)
    {
        $user = Auth::user()->id;
        $like = like::where('shop_id', $shop->id)->where('user_id', $user)->first();
        // dd($like);
        $like->delete();
        return back();
    }
    
    
    public function showFavorite()
    {
        $shops = \Auth::user()->like_shops()->orderBy('created_at', 'desc')->get();
       
       
        
        return view('favorite')->with(["shops" => $shops]);
    }
}
