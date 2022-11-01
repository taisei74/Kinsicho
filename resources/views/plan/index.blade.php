@extends('layouts.app')

@section('content')
<link rel='stylesheet' href="{{ secure_asset('css/planindex.css') }}">
    <div class="container">
        <div class="wrapper-top">
            
            <div>
                <h1>プランいいね数ランキング</h1>
            </div>
            <div>
                @foreach($plans as $key => $plan)
                <h4>{{ $key + 1 }}位<a href='/favorite/plan/{{ $plan->id }}'>{{ $plan->plan_name }}</a>いいね数:{{ $plan->plan_likes->count() }}</h4><h5>作成者:{{ $plan->user->name }}</h5>
                @endforeach
            </div>
           </div>
    </div>
        
@endsection