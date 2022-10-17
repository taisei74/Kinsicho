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
            <h1>プランいいね数ランキング</h1>
        </div>
        <div>
            @foreach($plans as $key => $plan)
            <h4>{{ $key + 1 }}位<a href='/favorite/plan/{{ $plan->id }}'>{{ $plan->plan_name }}</a>いいね数:{{ $plan->plan_likes->count() }}</h4>作成者:{{ $plan->user->name }}
            @endforeach
        </div>
        <a href='/'>戻る</a>
    </body>
</html>