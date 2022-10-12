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
            <div class="container">
                <h2>お気に入り登録店舗一覧</h2>
            @foreach($shops as $shop)
                <ul>
                    <li><a href='/shop/show/{{ $shop->id }}'>{{ $shop->name }}</a></li>
                </ul>
            @endforeach
                </div>
                <div>
                    <h2><a href='/favorite/plan'>プラン作成</a></h2>
                </div>
                <div>
                    <h3><a href='/favorite/plan/index'>プランランキング</a></h3>
                </div>
        </div>
     </body>
</html>