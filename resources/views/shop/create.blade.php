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
        <h1>登録画面</h1>
            <form action='/shop/show/create' method='POSt' enctype="multipart/form-data">
                @csrf
                <div>
                    <label>建物登録</label>
                    <input type='text' name='shop[name]' placeholer="例:錦糸公園"/>
                    <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
                </div>
                <div>
                    <label>金額登録</label>
                    <!--<input type="text" name="shop[money]" placeholer="例:2000円"/>-->
                    <!--<p class="money__error" style="color:red"></p>-->
                            <select class="form-control" id="money" name="shop[money]">
                                <option value="500">500円</option>
                                <option value="1000">1000円</option>
                                <option value="1500">1500円</option>
                                <option value="2000">2000円</option>
                                <option value="2500">2500円</option>
                                <option value="3000">3000円</option>
                                <option value="0">0円</option>
                            </select>
                </div>
                <div>
                     <label>店舗紹介</label>
                    <textarea name="shop[body]" placeholer="例:店舗の紹介です。"></textarea>
                </div>
                <h2>ジャンル登録</h2>
                @foreach($genres as $genre)
                <label>
                   
                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                {{ $genre->genre_name }}
                </input>
                </label>
                @endforeach
                <div>
                    <div>
                        <label for="image">画像登録</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                <button type='submit' class="btn btn-primary btn-lg">送信</button>
                 </form>
                </div>
                <p><label><span>緯度:</span> <input type="text" id="lat" name="shop[lat]"></label><br/>
<label><span>経度:</span> <input type="text" id="lng" name="shop[lng]"> </label></p>

                	<div id="form">
<h2>緯度･経度を求める住所を入力</h2>
<input type="text" id="address" value="東京都千代田区霞が関1-3-1" />
<button id="exec">検索</button>
<!--<p><label><span>緯度:</span> <input type="text" id="lat" name="shop[lat]"></label><br/>-->
<!--<label><span>経度:</span> <input type="text" id="lng" name="shop[lng]"> </label></p>-->
</div>
<script>
document.getElementById('exec').addEventListener('click', () => {
if (document.getElementById('address').value) {
getLatLng(document.getElementById('address').value, (latlng) => {
// map.setCenter(latlng)
console.log(latlng.lat, latlng.lng);
document.getElementById('lat').value = latlng.lat;
document.getElementById('lng').value = latlng.lng;
})
}
})
</script>

 <script src="https://cdn.geolonia.com/community-geocoder.js"></script>	
 
           
    </div>
    </body>
</html>