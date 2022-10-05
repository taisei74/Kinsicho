<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
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
        
        return view('plan/show')->with(['plan'=> $plan]);
    }
}
