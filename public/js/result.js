function initMap() {
    // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
    latlng = new google.maps.LatLng(lat, lng);
    map = document.getElementById("map");
    // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
  
    // オプションを設定
    opt = {
        zoom: 14, //地図の縮尺を指定
        center: latlng, //センターを東京タワーに指定
    };
    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);
    
    // 追加
    marker = new google.maps.Marker({
        // ピンを差す位置を決めます。
        position: latlng,
	// ピンを差すマップを決めます。
        map: mapObj,
	// ホバーしたときに「tokyotower」と表示されるようにします。
        title: 'tokyotower',
    });
}

