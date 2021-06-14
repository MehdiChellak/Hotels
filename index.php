<?php

require_once __DIR__.'/vendor/autoload.php';
include("model/connect.php");

$action = isset($_GET['action'])?$_GET['action']:'';


if($action=="map")
{
    $clientLatitude = $_POST['latitude'];
    $clientLongitude =$_POST['longitude'];
    $locations = getNodesWithDisatance($clientLatitude,$clientLatitude);
    //print_r($locations);
    include("map.php");
}
elseif($action == "ss")
{
    echo "ss";
}
else{
    include("send.php");
}

    