@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
        <div class="container">
            <div class="wrapper-top">
            <form action='/shop/show/{{ $shop->id }}' method='POSt' enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content__post">
            <h1>店舗名編集</h1>
               <input type='text' name='shop[name]' value='{{ $shop->name }}'/>
                <h3>金額編集</h3>
                <input type='text' name='shop[money]' value='{{ $shop->money }}'/>
                <h3>紹介</h3>
                <input type='text' name='shop[body]' value='{{ $shop->body }}'/>
                <h3>住所編集</h3>
                <input type='text' name='shop[address]' value='{{ $shop->address }}'/>
            </div>
            
             <div>
                        <label for="image">画像登録</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
            
            
            @foreach($genres as $genre)
            <label>
                   
                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                {{ $genre->genre_name }}
                </input>
                </label>
                @endforeach
                <div>
            <button type='submit'>編集完了</button>
                <div></div>
            </form>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </div>
@endsection