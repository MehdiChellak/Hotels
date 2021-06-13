<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin="">
   </script>
</head>
<body>

<p>Click the button to get your coordinates.</p>



<p id="demo"></p>
<div id="mapid" style="width:1200px; height:800px;"></div>
</body>

<?php $location = [
        ['Sefrou',33.829262, -4.839340,3],
        ['Barcelo', 45.75, 4.85, 2],
        ['Rpyal Mirage', 43.3, 5.40, 1],
        
      ];
      
      ?>
<script>


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

    
var jArray = <?php echo json_encode($location); ?>;

// fonction pour afficher les parames by mehdi 
// for(var i=0; i<jArray.length; i++){
//         alert(jArray[i][0]);
//     }

 getLocation(jArray);

</script>

</body>
</html>