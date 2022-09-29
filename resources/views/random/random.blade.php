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
     
        <h1>検索結果</h1>
        @if(isset($randoms))
        <table class="table">
          <tr>
            <th>店名</th><th>金額</th>
          </tr>
          @foreach($randoms as $shop)
            <tr>
              <td>{{$shop->name}}</td><td>{{$shop->money}}円</td>
            </tr>
          @endforeach
          <h1>合計{{ $total }}円です</h1>
        @endif
        @if(!empty($message_random))
        <div class="alert alert-primary" role="alert">{{ $message_random}}</div>
        @endif
        </div>
      <h4>[<a href='/serch'>プラン検索画面に戻る</a>]</h4>
    </body>
</html>