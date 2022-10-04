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
          <h1>予算以下に収まるようにランダムで3店舗紹介します</h1>
        <form action='/serch/random' method="POST">
        @csrf
        @method('GET')
        <label for="title">予算</label>
         <input type='serch' class="form-control" name='money'>
        
         
         <input type="submit" value="送信"/>
         </form>
         <div>
             <div>
             <h1>予算以下の店舗を検索します</h1>
        <form action='/shop/show' method="POST">
        @csrf
        @method('GET')
        <label for="title">予算</label>
        <input type='serch' class="form-control" name='money'>
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
         </div>
         <a href='/'>ホームに戻る</a>
    </body>
</html>