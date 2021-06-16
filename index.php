<?php

require_once __DIR__.'/vendor/autoload.php';
include("model/connect.php");

$action = isset($_GET['action'])?$_GET['action']:'';


if($action=="map")
{
    $clientLatitude = $_POST['latitude'];
    $clientLongitude =$_POST['longitude'];
    $clientName = $_POST["nom"]." ".$_POST['prenom'];
    $locations = getNodesWithDisatance($clientLatitude,$clientLongitude);
    
    include("map2.php");
}
elseif($action == "getHotel")
{
   $result =  getHotel(842);
   
}
else{
    include("send.php");
}

    