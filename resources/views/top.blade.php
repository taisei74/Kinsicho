@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/top.css">
<div class="container">
        <div class="wrapper-top">
            <h1>錦糸町で遊ぼう</h1>
            @if(!empty($shops))
      @foreach($shops as $shop)
      {{ $shop->name }}
      @endforeach
      @endif
         <div class='yosan'>

            <h1><a href='/serch'>検索をする</a></h1>
        </div>
    </div>
</div>

       
      
@endsection