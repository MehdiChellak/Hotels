<?php 

function connection()
{
    // connection neo4j
    try
    {
        $client = Laudis\Neo4j\ClientBuilder::create()
        ->addHttpConnection('backup', 'http://neo4j:1234@localhost')
        ->addBoltConnection('default', 'bolt://neo4j:1234@localhost')
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
    
     $req = "with point( {latitude:, longitude: }) as poi
     match(l:hotels)
     return distance(l.point, poi)/1000 as distance ,l.nom as hotels, l.point.latitude as lat ,
      l.point.longitude as long, id(l) as id,l.prix as prix,l.persons as per
     order by distance asc
     limit 25";
        
         $result = $client->run($req);
        return $result;
}

    function getHotel($id)
    {
        $client = connection();
        $req = "
                match (h:hotels) 
                where id(h) = $id
                return h.nom as nom,h.stars as stars, h.desc as desc, h.
                limit 1
                ";

        $result = $client->run($req);
        $arr = $result->toArray();
        return $result;
    }


   
        
    
?>

