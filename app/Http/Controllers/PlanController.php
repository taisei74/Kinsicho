<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;
use App\Plan;
use App\Plan_Like;
use App\User;
use App\Shop;


class PlanController extends Controller
{
    public function plan()
    {
        //ログインユーザーがお気に入りした店舗の取得
         $shops = \Auth::user()->like_shops()->orderBy('created_at', 'desc')->get();
         
        return view('plan.create')->with(['shops' => $shops]);
    }
    
    public function createPlan(Plan $plan, PlanRequest $request)
    {
        $input_plan = $request['plan'];
        $input_plan_shops = $request->shops_array;
        
        $plan->user_id = $request->user()->id;
        $plan->fill($input_plan)->save();
        
        $plan->plan_shops()->attach($input_plan_shops);
      
        return redirect('/favorite/plan/' . $plan->id);
    }
    
    public function show(Plan $plan)
    {
        //お気に入り店舗の取得
        $plan_like = Plan_Like::where('plan_id', $plan->id)->where('user_id', auth()->user()->id)->first();
        return view('plan/show')->with(['plan'=> $plan, 'plan_like'=>$plan_like]);
    }
    
    public function index()
    {
        $plans = Plan::withCount('plan_likes')->orderBy('plan_likes_count', 'desc')->paginate(10);
        return view('plan/index')->with(['plans' => $plans]);
    }
    public function delete(Plan $plan)
    {
        $plan->delete();
        return redirect('/');
    }
}
