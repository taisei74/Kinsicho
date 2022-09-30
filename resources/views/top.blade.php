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
        <!--<div>-->
        <!--    <div class='yosan'>-->
        <!--        <h2>[<a href='/serch'>予算でプランを調べる</a>]</h2>-->
        <!--    </div>-->
        <!--    <div class='zenbu'>-->
        <!--        <h2>[<a href='/shop'>予算以下の店舗を調べる</a>]</h2>-->
        <!--    </div>-->
        <!--</div>-->
        
        
        <div class='yosan'>
        <h1><a href='/serch'>検索をする</a></h1>
        </div>
        <div class='create'>
                <h3><a href="/shop/show/create">店舗登録</a></h3>
        </div>
        <diV>
            <h4><a href='/favorite'>お気に入りにした店舗一覧</a></h4>
        </diV>
        <div>
            <h4><a href='/favorite/plan'>人気プランを一覧にする</a></h4>
        </div>
    </body>
</html>