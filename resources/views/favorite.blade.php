@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/favorite.css') }}">
    <div class="container">
        <div class="wrapper-top">
            <div>
                    
             <h2>お気に入り登録店舗一覧</h2>
            @foreach($shops as $shop)
                <ul>
                    <li><a href='/shop/show/{{ $shop->id }}'>{{ $shop->name }}</a></li>
                </ul>
            @endforeach
            </div>
            <div>
                <h2>お気に入りプラン一覧</h2>
                @foreach($plans as $plan)
                <ul>
                    <li><a href='/favorite/plan/{{ $plan->id }}'>{{ $plan->plan_name }}</a></li>
                </ul>
                @endforeach
            </div>
                <div>
                    <h2><a href='/favorite/plan'>プラン作成</a></h2>
                </div>
                <div>
                    <h3><a href='/favorite/plan/index'>プランランキング</a></h3>
                </div>
        </div>
    </div>
@endsection