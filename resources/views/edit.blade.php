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
       
        </h1>
        <div class="content">
            <form action='/shop/show/{{ $shop->id }}' method='POSt'>
            @csrf
            @method('PUT')
            <div class="content__post">
            <h1>店舗名編集</h1>
               <input type='text' name='shop[name]' value='{{ $shop->name }}'/>
                <h3>金額編集</h3>
                <input type='text' name='shop[money]' value='{{ $shop->money }}'/>
                <h3>紹介</h3>
                <input tupe='text' name='shop[body]' value='{{ $shop->body }}'/>
            </div>
            @foreach($genres as $genre)
            <label>
                   
                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                {{ $genre->genre_name }}
                </input>
                </label>
                @endforeach
            <button type='submit'>編集完了</button>
            </form>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
