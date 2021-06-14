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

<p>welcome to your page home </p>

 <form action="index.php?action=map" method="post" > 

<label for=""> nom  </label><input type="text" name="nom" id="nom"> <br>
<label for=""> prenom  </label><input type="text" name="prenom" id="prenom"> <br>
<label for="">  latitude </label><input type="text" name="latitude" id="latitude"> <br>
<label for=""> longitude  </label><input type="text" name="longitude" id="longitude"> <br>
<input type="submit" name ="click">Try It</input>

 </form> 

<p id="demo"></p>
<div id="mapid" style="width:1200px; height:800px;"></div>
</body>

<script>
let getLocationPromise = new Promise((resolve, reject) => {
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            // console.log(position.coords.latitude, position.coords.longitude) //test...

            lat = position.coords.latitude
            long = position.coords.longitude

            // console.log("LATLONG1: ", lat, long) //test...

            // Resolving the values which I need
            resolve({latitude: lat, 
                    longitude: long})
        })

    } else {
        reject("your browser doesn't support geolocation API")
    }
})

// Now I can use the promise followed by .then() 
// to make use of the values anywhere in the program
getLocationPromise.then((location) => {
  console.log(location.latitude)
  document.getElementById("latitude").value = location.latitude;
  document.getElementById("longitude").value = location.longitude;
}).catch((err) => {
    console.log(err)
})
</script>


</body>
</html>