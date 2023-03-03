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
<html>

$services = array();
$data_reversed = array_reverse($data['data']);
$i=0;
foreach (array_slice($data_reversed, 0, 4) as $service) {
    $i++;
    print($i);
    $uri_url = $service['relationships']['field_image']['links']['related']['href'];
    $fieldsecondary = $service['attributes']['field_secondary_title']['processed'];
    $fieldservice = $service['attributes']['field_services']['processed'];

    // fetch the second JSON file using GuzzleHttp
    $response = $client->get($uri_url);
    $data = json_decode($response->getBody(), true);

    // extract the image URL from the second JSON file
    $image_url = $data['data']['attributes']['uri']['url'];

    $services[] = new Service($image_url, $fieldsecondary, $fieldservice);
}


$services = array();
$data_count = count($data['data']);

for ($i = $data_count - 1; $i >= max($data_count - 4, 0); $i--) {
  echo ($i);
  $service = $data['data'][$i];
  $fieldsecondary = $service['attributes']['field_secondary_title']['processed'];
  $fieldservice = $service['attributes']['field_services']['processed'];
  echo $fieldsecondary . "<br>";
  echo $fieldservice . "<br>";

}
  $data_reversed = array_reverse($data['data']);
  foreach (array_slice($data_reversed, 0, 4) as $img) {
    $uri_url = $img['relationships']['field_image']['links']['related']['href'];
    // fetch the second JSON file using GuzzleHttp
    $response = $client->get($uri_url);
    $data = json_decode($response->getBody(), true);
    // extract the image URL from the second JSON file
    $image_url = $data['data']['attributes']['uri']['url'];
    echo '<img src="https://ir-dev-d9.innoraft-sites.com' . $image_url . '">';
    echo "<br>";
}