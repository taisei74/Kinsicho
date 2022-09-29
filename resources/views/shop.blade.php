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
        @if(isset($shops))
        <table class="table">
          <tr>
            <th>店名</th><th>金額</th>
          </tr>
          @foreach($shops as $shop)
            <tr>
             <td> <a href='/shop/show/{{ $shop->id }}'>{{$shop->name}}</a></td><td>{{$shop->money }}円</td>
            </tr>
          @endforeach
        
        @endif
        @if(!empty($message))
        <div class="alert alert-primary" role="alert">{{ $message}}</div>
        @endif
        </div>
    </body>
</html>