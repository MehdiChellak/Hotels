<?php 

require_once __DIR__.'/vendor/autoload.php';
// connection neo4j
$client = Laudis\Neo4j\ClientBuilder::create()
    ->addHttpConnection('backup', 'http://neo4j:raja@localhost')
    ->addBoltConnection('default', 'bolt://neo4j:raja@localhost')
    ->setDefaultConnection('default')
    ->build();



    // envoie requette
    $result = $client->run('with point({latitude:34.0426721, longitude:-4.9956895 }) as poi
    match(l:hotel)
    where distance(l.point, poi) < 1000
    return distance(l.point, poi) as distance ,l.name as hotels, l.point.latitude as lat , l.point.longitude as long
    order by distance desc'); 
    
    foreach($result as $hotel)
    {
        echo $hotel->get("hotels");
    }
    