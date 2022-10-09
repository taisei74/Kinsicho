<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Plan_Like;
use App\User;
use App\Shop;


class PlanController extends Controller
{
    public function plan()
    {
         $shops = \Auth::user()->like_shops()->orderBy('created_at', 'desc')->get();
         
        return view('plan')->with(['shops' => $shops]);
    }
    
    public function createPlan(Plan $plan, Request $request)
    {
        $input_plan = $request['plan'];
        $input_plan_shops = $request->shops_array;
        
        
        $plan->fill($input_plan)->save();
        $plan->plan_shops()->attach($input_plan_shops);
        // dd($plan->plan_shops);
        // dd($plan);
        return redirect('/favorite/plan/' . $plan->id);
    }
    
    public function show(Plan $plan)
    {
        $plan_like = Plan_Like::where('plan_id', $plan->id)->where('user_id', auth()->user()->id)->first();
        return view('plan/show')->with(['plan'=> $plan, 'plan_like'=>$plan_like]);
    }
    
    public function index()
    {
        $plans = Plan::withCount('plan_likes')->orderBy('plan_likes_count', 'desc')->get();
        return view('plan/index')->with(['plans' => $plans]);
    }
    public function delete(Plan $plan)
    {
        $plan->delete();
        return redirect('/');
    }
}
