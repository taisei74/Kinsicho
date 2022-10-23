@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <div class="container">
        <div class="serch-random">
          <h3>予算以下に収まるようにランダムで3店舗紹介します</h3>
        <form action='/serch/random' method="POST">
        @csrf
        @method('GET')
        <p>予算</br>
        <select class="form-control" id="money" name="money[]">
            <option value="500">500円</option>
            <option value="1000">1000円</option>
            <option value="2000">2000円</option>
            <option value="3000">3000円</option>
            <option value="4000">4000円</option>
            <option value="5000">5000円</option>
        </select></p>
         
         <input type="submit" value='検索' class="btn btn-success"/>
         </form>
         </div>
         <div>
             <div class="serch-all">
             <h3>予算以下の店舗を検索します</h3>
        <form action='/shop/show' method="POST">
        @csrf
        @method('GET')
        <div>
        <p>予算</br>
        <select class="form-control" id="money" name="money[]">
            <option value="500">500円</option>
            <option value="1000">1000円</option>
            <option value="2000">2000円</option>
            <option value="3000">3000円</option>
        </select></p>
        </div>
          <div>
              <div class="font-weight-bold">ジャンルを絞って検索</div>
             @foreach($genres as $genre)
             <label class="select-genre">
                 <input type='checkbox'  value="{{ $genre->genre_name }}" name="genre_name" >
                 {{ $genre->genre_name }}
                 </input>
             </label>
             @endforeach
         </div>
         <input type="submit" value="検索" class="btn btn-success"/>
         </form>
         </div>
         </div>
         </div>
         <!--<a href='/'>ホームに戻る</a>-->
@endsection