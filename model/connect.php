<?php 

function connection()
{
    // connection neo4j
    try
    {
        $client = Laudis\Neo4j\ClientBuilder::create()
->addHttpConnection('backup', 'http://neo4j:raja@localhost')
->addBoltConnection('default', 'bolt://neo4j:raja@localhost')
->setDefaultConnection('default')
->build();
    }catch(Exeption $e)
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    return $client;
}



function getNodesWithDisatance($latC,$longC)
{
    
    $client = connection();
    
     $req = "with point( {latitude:$latC, longitude:$longC }) as poi
     match(l:hotel)
     return distance(l.point, poi) as distance ,l.name as hotels, l.point.latitude as lat , l.point.longitude as long
     order by distance asc";
        // envoie requette {latitude:34.0426721, longitude:-4.9956895 }  where distance(l.point, poi) < 10000
        echo $req;
        $result = $client->run($req);
        
        foreach($result as $key){
            echo "<br>";
            echo $key->get("hotels");
            echo $key->get("distance");
            echo "<br>";
        }
        
        return $result;
}




?>
<!-- <script>
    var variableRecuperee = <?php echo json_encode($result); ?>;
    console.log(variableRecuperee);
    console.log(variableRecuperee.length);
    for(i=0;i<variableRecuperee.length;i++){
        console.log("lat est",variableRecuperee[i]["lat"]);
    }
</script> -->

