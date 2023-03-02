<?php
use \GuzzleHttp\Client;
require_once 'vendor/autoload.php';

//defining a class
class Action{
  public $images;
  public $heading;
  public $content;

  public function __construct($images, $heading, $content){
    $this->images = $images;
    $this->heading = $heading;
    $this->content = $content;
  }
}
$client = new Client(['base_uri' => 'https://ir-dev-d9.innoraft-sites.com/']);
$response = $client->get('jsonapi/node/services');
$data = json_decode($response->getBody(), true);

$services = array();
$data_count = count($data['data']);
for ($i = $data_count - 1; $i >= $data_count - 4 && $i >= 0; $i--) {
  $service = $data['data'][$i];
  $image = $service['relationships']['field_image']['links']['related']['href'];
  $heading = $service['attributes']['field_secondary_title']['processed'];
  $content = $service['attributes']['field_services']['processed'];

  // fetch the second JSON file using GuzzleHttp
  $response = $client->get($image);
  $data = json_decode($response->getBody(), true);

  // extract the image URL from the second JSON file
  $images = $data['data']['attributes']['uri']['url'];
  $services[] = new Action($images,$heading,$content);
}
?>