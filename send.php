<?php 
  
  $locations = [
    ['Sefrou',33.829262, -4.839340,3],
    ['Barcelo', 45.75, 4.85, 2],
    ['Rpyal Mirage', 43.3, 5.40, 1],
  ];
?>

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

 <form action="index.php?action=map" method="post" > 

<input type="submit" name ="click" onclick="getLocation()">Try It</input>

 </form> 

<p id="demo"></p>
<div id="mapid" style="width:1200px; height:800px;"></div>
</body>

<script>

var x = document.getElementById("demo");
var lat;
var long;
function getLocation() {
  if (navigator.geolocation) {
    var lat = navigator.geolocation.getCurrentPosition(showPosition);
    
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  lat=position.coords.latitude;
  long=position.coords.longitude;

  // $.ajax({
  //  url: 'connect.php',
  //  type: 'post',
  //  data: {latitude:65 ,654: long},
  //  success: function(response){
  //   content.html(response);
  //  }
// });

}



</script>


</body>
</html>