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
    <h1>プラン作成画面</h1>
    <div>
        <form action='/favorite/plan' method='POST'>
            @csrf
            <div>
            <input type='text' name='plan[plan_name]' placeholder="プラン名" >
            </div>
            <div>
                <input type='text' name='plan[plan_body]' placeholder="プラン説明">
            </div>
            <div>
                @foreach($shops as $shop)
                <label>
                    <input type="checkbox" value="{{ $shop->id }}" name="shops_array[]">
                    {{ $shop->name }}
                    </input>
                </label>
                @endforeach
            </div>
            <button type='submit'>送信</button>
        </form>
    </div>
         <a href='/'>ホームに戻る</a>
    </body>
</html>