@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/showall.css') }}">
    <div class="container">
        <div class="wrapper-top">
        <div>
            <h1 class="title">{{ $shop->name }}</h1> 
                @if( Auth::id() === $shop->user_id )
                <p><a href='/shop/show/{{ $shop->id }}/edit'>編集</a></p>
                @endif
                </div>
                    <div class="content">
                        <div class="content__post">
                        <h3>金額</h3>
                        <h4>{{ $shop->money }}円</h4>
                        <h3>紹介</h3>
                        <h4>{{ $shop->body }}</h4>
                @foreach($shop->genres as $genre)
                <h4>お店のジャンルは{{ $genre->genre_name }}</h4>
                @endforeach
                </div>
            <tr>
                <td>
                    <img src="{{ secure_asset('storage/'.$shop->image) }}" class="picture">
                </td>
                <td>
                     <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q={{ $shop->address }}' width='50%' height='300' frameborder='0'></iframe>
                </td>
            </tr>
 
            @auth
            @if($like)
	            <a href="{{ route('unlike', $shop) }}" class="btn btn-success btn-sm">
		            お気に入り登録
		        <span class="badge">{{ $shop->likes->count() }}</span>
	            </a>
            @else
	        <a href="{{ route('like', $shop) }}" class="btn btn-secondary btn-sm">
	        お気に入り登録
		    <span class="badge">{{ $shop->likes->count() }}</span>
	        </a>
            @endif
            @endauth
            </span>
        </div>
            @if( Auth::id() === $shop->user_id )
                <div>
                    <form action='/shop/show/{{ $shop->id }}' id="form_{{ $shop->id }}" method='POST' style='display:inline'>
                    @csrf
                    @method('DELETE')
                    <button type='submit' name='delete' value='削除' onClick="return check()" class="btn btn-danger">削除</button>
                    <script>
                        function check() {
                            var checked = confirm("本当に削除しますか?");
                            if (checked == true) {
                                return true;
                            }else{
                                return false;
                            }
                        }
                    </script>
            @endif
                </form>
              </div>
            </div>
          </div>
    </div>
  
@endsection