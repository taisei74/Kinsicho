@extends('layouts.app')

@section('content')
<link rel='stylesheet' href="{{ secure_asset('css/planshow.css') }}">
<div class='container'>
    <div class='wrapper-top'>
        
    <div>
       <h1>
        {{ $plan->plan_name }}
       </h1>
       <h3> {{ $plan->plan_body }}</h3>
       @foreach($plan->plan_shops as $shop)
       <h3>店名:<a href="/shop/show/{{ $shop->id }}">{{ $shop->name }}</a></h3>
       <h3>{{ $shop->money }}円</h3>
                @if(isset($shop->image))
                <img src="{{ secure_asset('storage/'.$shop->image) }}" width="250px" height="300px">
                @endif
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
    @if( Auth::id() === $plan->user_id )
    <div>
        <form action="/favorite/plan/{{ $plan->id }}" id="form_{{ $plan->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
        @endif
        </div>
        <div>
            <a href="/favorite">戻る</a>
        </div>
    
    
    </div>
</div>
@endsection