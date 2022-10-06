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
       <h2>予算{{ $message }}</h2>
        <table class="table">
          <tr>
            <th>店名</th><th>金額</th>
          </tr>
          @foreach($shops as $shop)
            <tr>
             <td> <a href='/shop/show/{{ $shop->id }}'>{{ $shop->name }}</a></td><td>{{ $shop->money }}円</td>
            </tr>
          @endforeach
        
        
  
           {{ $shops->appends(request()->input())->links() }}
        </div>
    </body>
</html>