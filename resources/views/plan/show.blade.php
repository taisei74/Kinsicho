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
       <h1>
        {{ $plan->plan_name }}
       </h1>
       @foreach($plan->plan_shops as $shop)
       <h1>店名:{{ $shop->name }}</h1>
       <h1>{{ $shop->money }}円</h1>
       @endforeach
    </div>
    <div>
        @if($plan_like)
        <a href="{{ route('plan_unlike', $plan) }}" class="btn btn-success btn-sm">
            いいね
            <span class="badge">
                {{ $plan->plan_likes->count() }}
            </span>
        </a>
        @else
        <a href="{{ route('plan_like', $plan) }}" class="btn btn-secondary btn-sm">
            いいね
            <span class="badge">
                {{ $plan->plan_likes->count() }}
            </span>
        </a>
        @endif
    </div>
    <div>
        <form action="/favorite/plan/{{ $plan->id }}" id="form_{{ $plan->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
        <div>
            <a href="/favorite">戻る</a>
        </div>
    </div>
    </body>
</html>