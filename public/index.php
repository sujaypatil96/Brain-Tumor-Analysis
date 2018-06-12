<?php
    require '../includes/vendor/autoload.php';
    $client = Elasticsearch\ClientBuilder::create()->build();

    if ($client) {
    	echo 'connected' . "<hr />";
    }

    // getting data in ES
    $params = [
    	'index' => 'my_index',
    	'type' => 'my_type',
    	'id' => 'my_id',
    ];

    $response = $client->get($params);
    echo $response['_source']['first field'];

?>
