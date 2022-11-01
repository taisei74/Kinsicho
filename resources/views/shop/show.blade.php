@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/show.css') }}">
    <div class="container">
        <div class="wrapper-top">
            <h1>検索結果</h1>
                <h2>予算{{ $message }}</h2>
                <table class="table">
                    <tr>
                        <th>店名</th><th>金額</th><th>お気に入り数</th>                    </tr>
                    @foreach($shops as $shop)
                    <tr>
                        <td> <a href='/shop/show/{{ $shop->id }}' class="shop">{{ $shop->name }}</a></td><td>{{ $shop->money }}円</td><td class="likes">{{ $shop->likes->count() }}</td>
                    </tr>
                    @endforeach
                <div class="footer">
                    {{ $shops->appends(request()->input())->links() }}
                </div>
        </div>
    </div>
@endsection