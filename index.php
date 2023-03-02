<?php
use \GuzzleHttp\Client;
require_once 'vendor/autoload.php';

$client = new Client(['base_uri' => 'https://ir-dev-d9.innoraft-sites.com/']);
$page = 0;
$services = [];
do {
    $page++;
    $response = $client->get('jsonapi/node/services', [
        'query' => [
            'page' => [
                'limit' => 50,
                'offset' => ($page - 1) * 50,
            ],
            
        ],
    ]);
    $data = json_decode($response->getBody(), true);
    foreach ($data['data'] as $item) {
        $services[] = $item['attributes']['title'];
    }
} while (isset($data['links']['next']));

foreach ($services as $service) {
    echo $service . '<br>';
}



$images = $data['data']['relationships']['field_images']['links']['related']['href'];
$response = $client->get($images);
$data = json_decode($response->getBody(), true);
$img_url = $data['data']['attributes']['uri']['url'];
echo "<img src='https://ir-dev-d9.innoraft-sites.com$img_url>";

?>
<html><