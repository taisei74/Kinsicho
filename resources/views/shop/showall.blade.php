@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        
        <h1 class="title">
            {{ $shop->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>金額</h3>
                <h4>{{ $shop->money }}円</h4>
                <h3>紹介</h3>
                <h4>{{ $shop->body }}</h4>
             
                @foreach($shop->genres as $genre)
            
                お店のジャンルは{{ $genre->genre_name }}
                @endforeach
            </div>
        <div class="picture">
        <img src="{{asset('storage/'.$shop->image) }}"　width="250px" height="300px">
         </div>

 
<!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
@if($like)
<!-- 「いいね」取消用ボタンを表示 -->
	<a href="{{ route('unlike', $shop) }}" class="btn btn-success btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $shop->likes->count() }}
		</span>
	</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	<a href="{{ route('like', $shop) }}" class="btn btn-secondary btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $shop->likes->count() }}
		</span>
	</a>
@endif
</span>
        </div>
       
        <p><a href='/shop/show/{{ $shop->id }}/edit'>編集</a></p>
     <div>
            <form action='/shop/show/{{ $shop->id }}' id="form_{{ $shop->id }}" method='POST' style='display:inline'>
              @csrf
                  @method('DELETE')
                  <div class="modal-body">
                    {{ $shop->name }}を削除します。よろしいですか？
                  </div>
                 <button type='submit'>削除</button>
                </form>
              </div>
        <div id="map" style="height:500px">
        
	</div>
	<script>
	const lat = {{ $shop->lat }};
	
	const lng = {{ $shop->lng }};
	</script>


	<script src="{{ asset('/js/result.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCI94DFBvjIw2fTcG8VKvMnJbS-ACUmyOs&callback=initMap" async defer></script>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
@endsection