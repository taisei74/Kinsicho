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
        <p><a href='/shop/show/{{ $shop->id }}/edit'>編集</a></p>
        <h1 class="title">
            {{ $shop->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>金額</h3>
                <h4>{{ $shop->money }}円</h4>
                <h3>紹介</h3>
                <h4>{{ $shop->body }}</h4>
            </div>
         
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
