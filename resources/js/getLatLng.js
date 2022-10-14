
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