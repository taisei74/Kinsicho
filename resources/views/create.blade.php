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
        <div>
        <h1>登録画面</h1>
            <form action='/shop/show/create' method='POSt'>
                @csrf
                <div>
                    <label>建物登録</label>
                    <input type='text' name='shop[name]' placeholer="例:錦糸公園"/>
                </div>
                <div>
                    <label>金額登録</label>
                    <input type="text" name="shop[money]" placeholer="例:2000円"/>
                </div>
                <h2>ジャンル登録</h2>
                @foreach($genres as $genre)
                <label>
                   
                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                {{ $genre->genre_name }}
                </input>
                </label>
                @endforeach
                <div>
                <button type='submit'>送信</button>
                </div>
            </form>
    </div>
    </body>
</html>