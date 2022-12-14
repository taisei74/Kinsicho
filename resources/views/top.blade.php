@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/top.css">
<div class="container">
        <div class="wrapper-top">
            <h1>錦糸町で遊ぼう</h1>
            <h2>作成店舗</h2>
            @if(!empty($shops) || !empty($plan))
              @foreach($shops as $shop)
              <ul type="circle">
                <li><a href="/shop/show/{{ $shop->id }}">{{ $shop->name }}</a></li>
              </ul>
              @endforeach
              <h2>作成プラン</h2>
              @foreach($plans as $plan)
              <ul type="circle">
                  <li><a href="/favorite/plan/{{ $plan->id }}">{{ $plan->plan_name }}</a></li>
              </ul>
              @endforeach
            @endif
            
        <div class='yosan'>

            <h1><a href='/serch'>検索をする</a></h1>
        </div>
    </div>
</div>

       
      
@endsection