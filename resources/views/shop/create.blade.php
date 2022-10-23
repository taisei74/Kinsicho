@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
<div class='container'>
    <div class='wrapper-top'>

        <div>
        <h1>登録画面</h1>
            <form action='/shop/show/create' method='POSt' enctype="multipart/form-data">
                @csrf
                <div>
                    <label>建物登録</label>
                    <input type='text' name='shop[name]' placeholer="例:錦糸公園"/>
                    <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
                </div>
                <div>
                    <label>金額登録</label>
                    <!--<input type="text" name="shop[money]" placeholer="例:2000円"/>-->
                    <!--<p class="money__error" style="color:red"></p>-->
                            <select class="form-control-money" id="money" name="shop[money]">
                                <option value="500">500円</option>
                                <option value="1000">1000円</option>
                                <option value="1500">1500円</option>
                                <option value="2000">2000円</option>
                                <option value="2500">2500円</option>
                                <option value="3000">3000円</option>
                                <option value="0">0円</option>
                            </select>
                </div>
                <div>
                     <label>店舗紹介</label>
                    <textarea name="shop[body]" placeholer="例:店舗の紹介です。"></textarea>
                </div>
                <div>
                <h2>ジャンル登録</h2>
                @foreach($genres as $genre)
                <label>
                   
                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                {{ $genre->genre_name }}
                </input>
                </label>
                @endforeach
                </div>
                <div>
                    <label>住所登録</label>
                    <input type="text" class="form-control-address" name="shop[address]">
                </div>
                <div>
                    <div>
                        <label for="image">画像登録</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                <button type='submit' class="btn btn-primary btn-lg">送信</button>
                 </form>

        </div>
    </div>
</div>
@endsection