@extends('layouts.app')

@section('content')
<link rel='stylesheet' href="{{ asset('css/planshow.css') }}">
<div class='container'>
    <div class='wrapper-top'>
        
    <div>
       <h1>
        {{ $plan->plan_name }}
       </h1>
       <h3> {{ $plan->plan_body }}</h3>
       @foreach($plan->plan_shops as $shop)
       <h1>店名:{{ $shop->name }}</h1>
       <h1>{{ $shop->money }}円</h1>
       @endforeach
    </div>
    <div>
        @if($plan_like)
        <a href="{{ route('plan_unlike', $plan) }}" class="btn btn-success btn-sm">
            いいね
            <span class="badge">
                {{ $plan->plan_likes->count() }}
            </span>
        </a>
        @else
        <a href="{{ route('plan_like', $plan) }}" class="btn btn-secondary btn-sm">
            いいね
            <span class="badge">
                {{ $plan->plan_likes->count() }}
            </span>
        </a>
        @endif
    </div>
    <div>
        <form action="/favorite/plan/{{ $plan->id }}" id="form_{{ $plan->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
        <div>
            <a href="/favorite">戻る</a>
        </div>
    </div>
    
    </div>
</div>
@endsection