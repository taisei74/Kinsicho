@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
<div class="container">
        <div class="wrapper-top">
            <h1>錦糸町で遊ぼう</h1>
        <div class="pictures">
            @foreach($shops as $shop)
             <img src="{{ asset('storage/'.$shop->image) }}" id="slide_img" class="slider" width="250px" height="300px">
            @endforeach
        </div>
         <div class='yosan'>

            <h1><a href='/serch'>検索をする</a></h1>
        </div>
    </div>
</div>

       
       
        <div>
            <h4><a href='/favorite/plan/index'>人気プランを一覧にする</a></h4>
        </div>
@endsection