<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin="">
</script>


var x = document.getElementById("demo");
var lat;
var long;
function getLocation(arr) {
  if (navigator.geolocation) {
    var lat = navigator.geolocation.getCurrentPosition(showPosition,arr);
    
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


function showPosition(position,arr) {
  /*x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;*/
  
  lat=position.coords.latitude;
  long=position.coords.longitude;
  var carte = L.map('mapid').setView([lat,long], 18);
  var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ©️ <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWVoZGk3ODk5NSIsImEiOiJja3BoZzJweGgycW8zMzFueDJ6YW9xY3oxIn0.j33pkXgBnB3ln2pNTfLCDQ'
        });
        
    tiles.addTo(carte); 
    var locations =  arr;
    for (i = 0; i < locations.length; i++) {
        var marqueur = L.marker([locations[i][1],locations[i][2]]).addTo(carte);
        marqueur.bindPopup(locations[i][0]);
    }
}
getLocation(jArray);