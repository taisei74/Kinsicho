@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/random.css') }}">
  <div class="container">
    <div class="wrapper-top">
      
        <h1>検索結果</h1>
        @if(isset($randoms))
        <table class="table">
          <tr>
            <th>店名</th><th>金額</th><th>店舗写真</th><th>紹介</th>
          </tr>
          @foreach($randoms as $shop)
            <tr>
              <td><a href="/shop/show/{{ $shop->id }}">{{$shop->name}}</a></td><td>{{$shop->money}}円</td>
              <td>
                @if(isset($shop->image))
                <img src="{{ secure_asset('storage/'.$shop->image) }}" width="250px" height="300px">
                </td>
                @endif
                <td>{{ $shop->body }}</td>
            </tr>
          @endforeach
          <h1>合計{{ $total }}円です</h1>
        @endif
        @if(!empty($message_random))
        <div class="alert alert-primary" role="alert">{{ $message_random}}</div>
        @endif
        </div>
      <h4>[<a href='/serch'>プラン検索画面に戻る</a>]</h4>
        </div>
  </div>
@endsection