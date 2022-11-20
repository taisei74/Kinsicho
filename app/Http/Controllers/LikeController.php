<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Like;
use App\User;
use App\Plan;
use App\Plan_Like;
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
        
        $plans = \Auth::user()->like_plans()->orderBy('created_at', 'desc')->where('deleted_at', null)->get();
        
        // dd($plans);
       
        return view('favorite')->with(["shops" => $shops, "plans" => $plans]);
    }
    
    public function plan_like(Plan $plan, Request $request)
    {
        $plan_like = new Plan_Like();
        $plan_like->plan_id = $plan->id;
        $plan_like->user_id = Auth::user()->id;
        $plan_like->save();
       
        return back();
    }
    
    public function plan_unlike(Plan $plan, Request $request)
    {
        $user = Auth::user()->id;
        $plan_like = Plan_Like::where('plan_id', $plan->id)->where('user_id', $user)->first();
        $plan_like->delete();
        // dd($plan_like);
        return back();
    }
}
