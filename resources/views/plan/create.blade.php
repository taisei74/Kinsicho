@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/plancreate.css') }}">
<div class="container">
    <div class="wrapper-top">
        
    <h1>プラン作成</h1>
    <div>
        <form action='/favorite/plan' method='POST'>
            @csrf
            <div class='name'>
                <h3>プラン名登録</h3>
            <input type='text' name='plan[plan_name]' placeholder="プラン名" >
             <p class="name__error" style="color:red">{{ $errors->first('plan.plan_name') }}</p>
            </div>
            <div class='body'>
                <h3>プラン概要</h3>
                <input type='text' name='plan[plan_body]' placeholder="プラン説明">
                <p class="name__error" style="color:red">{{ $errors->first('plan.plan_body') }}</p>
            </div>
            <div calss='select'>
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
         <a href='/favorite'>戻る</a>
         
    </div>
</div>
@endsection