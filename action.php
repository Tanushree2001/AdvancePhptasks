
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
$data_reversed = array_reverse($data['data']);
foreach (array_slice($data_reversed, 0, 4) as $var) {
  
  $heading = $var['attributes']['field_secondary_title']['processed'];
  $logo = $var['relationships']['field_service_icon']['links']['related']['href'];
  $content = $var['attributes']['field_services']['processed'];
  $image = $var['relationships']['field_image']['links']['related']['href'];


  // fetch the second JSON file 
  $response = $client->get($image);
  $data = json_decode($response->getBody(), true);
  
  // fetch the second JSON file 
  $response = $client->get($logo);
  $data = json_decode($response->getBody(), true);

  // extract the image URL from the second JSON file
  $images = $data['data']['attributes']['uri']['url'];
  
  $logos = $var['relationships']['thumbnail']['links']['href'];


  $response = $client->get($logos);
  $data = json_decode($response->getBody(), true);

  $logoss = $var['attributes']['uri']['url'];



  echo $heading . "<br>";
  echo $logoss . "<br>";
  echo $content . "<br>"; 
  echo '<img src="https://ir-dev-d9.innoraft-sites.com' . $images . '">';
  echo "<br>";
}
?>
