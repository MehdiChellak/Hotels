<!DOCTYPE html>
<html lang="en">

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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="style/style.css">
    <title>HOTEL ME</title>

    
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container flex">
            <h1 class="logo">HOTEL ME</h1>
        </div>
    </div>
    <!-- End-Navbar -->

    <!-- Showcase -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <img src="images/toto3.png" alt="world">
            </div>
            <div class="showcase-form card">
                <h2>HOTEL ME</h2>

                <form action="index.php?action=map" method="post">
                    <div class="form-control">
                        <input type="text" name="nom" placeholder="Nom.." required>
                    </div>
                    <div class="form-control">
                        <input type="text" name="prenom" placeholder="Prenom.." required>
                    </div>
                    
                    <div class="form-control">
                        <input type="hidden" name="latitude" id="latitude" placeholder="Latitude.."  >
                    </div>
                    <div class="form-control">
                        <input type="hidden" name="longitude" id="longitude" placeholder="Longitude.."  >
                    </div>

                    <div class="form-control">
                        <input type="text" name="latitude" id="latitude1" placeholder="Latitude.."  disabled>
                    </div>
                    <div class="form-control">
                        <input type="text" name="longitude" id="longitude1" placeholder="Longitude.."  disabled>
                    </div>
                    <input type="submit" value="SUBMIT" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
    <!-- End-Showcase -->
    

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

  document.getElementById("latitude1").value = location.latitude;
  document.getElementById("longitude1").value = location.longitude;

}).catch((err) => {
    console.log(err)
})
</script>
 
</body>

</html>