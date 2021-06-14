
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>

<p>Click the button to get your coordinates.</p>



<p id="demo"></p>
<div id="mapid" style="width:1400px; height:600px;"></div>
</body>

<script>

var x = document.getElementById("demo");
var carte = L.map('mapid').setView([34.026291199999996, -5.0069504], 18);
  var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ©️ <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWVoZGk3ODk5NSIsImEiOiJja3BoZzJweGgycW8zMzFueDJ6YW9xY3oxIn0.j33pkXgBnB3ln2pNTfLCDQ'
        });
    tiles.addTo(carte);
    var marqueur = L.marker([34.026291199999996,-5.0069504]).addTo(carte);
    marqueur.bindPopup("hotels");

    
    var locations = <?php echo json_encode($locations); ?>;
    // console.log(locations);
    // console.log(locations.length);
    // for(i=0;i<locations.length;i++){
    //     console.log("lat est",locations[i]["lat"]);
    // }

    for (i = 0; i < locations.length; i++) {
        var marqueur = L.marker([locations[i]["lat"],locations[i]["long"]]).addTo(carte);
        marqueur.bindPopup(locations[i]["hotels"]);
    }
 
</script>

</body>
</html>