@extends('layouts.app')


@section('content')
<div class='container'>
          <h1>予算以下に収まるようにランダムで3店舗紹介します</h1>
        <form action='/serch/random' method="POST">
        @csrf
        @method('GET')
        <p>予算</br>
        <select class="form-control" id="money" name="money[]">
            <option value="500">500円</option>
            <option value="1000">1000円</option>
            <option value="2000">2000円</option>
            <option value="3000">3000円</option>
        </select></p>
         
         <input type="submit" value="送信"/>
         </form>
         <div>
             <div>
             <h1>予算以下の店舗を検索します</h1>
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
             @foreach($genres as $genre)
             <label>
                 <input type='checkbox'  value="{{ $genre->genre_name }}" name="genre_name">
                 {{ $genre->genre_name }}
                 </input>
             </label>
             @endforeach
         </div>
         <input type="submit" value="送信"/>
         </form>
         </div>
          <a href='/'>ホームに戻る</a>
         </div>
        </div>
@endsection