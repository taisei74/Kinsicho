@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/favorite.css') }}">
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
                    <h2><a href='/favorite/plan'>プラン作成</a></h2>
                </div>
                <div>
                    <h3><a href='/favorite/plan/index'>プランランキング</a></h3>
                </div>
        </div>
    </div>
@endsection