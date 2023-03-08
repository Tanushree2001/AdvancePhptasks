<?php
use \GuzzleHttp\Client;
require_once 'vendor/autoload.php';

//defining a class
class Action{
  /**
   * The URL of image.
   *
   * @var string
   */
  public $images;
  /**
   * The URL of heading.
   *
   * @var string
   */
  public $heading;
  /**
   * The URL of content.
   *
   * @var string
   */
  public $content;
  /**
   * The URL of logo.
   *
   * @var array
   */
  public $logoss;
  
  //create a constructor containing images, heading , content and logos 
  public function __construct($images, $heading, $content, $logoss){
    $this->images = $images;
    $this->heading = $heading;
    $this->logoss = $logoss;
    $this->content = $content;
  }
  
  //created a function name fetching
  public function fetching(){
    
    //Initialize \guzzlehttp\client object
    $client = new Client(['base_uri' => 'https://ir-dev-d9.innoraft-sites.com/']);

    //send a GET request to retrieve data
    $response = $client->get('jsonapi/node/services');

    //convert response body to php array
    $data = json_decode($response->getBody(), true);
    
    //reversing the whole data
    $data_reversed = array_reverse($data['data']);

    //loop for the last four elements
    foreach (array_slice($data_reversed, 0, 4) as $var) {
    
    //get the heading
    $heading = $var['attributes']['field_secondary_title']['processed'];
    //get the url for logos
    $logo = $var['relationships']['field_service_icon']['links']['related']['href'];
    //get the content
    $content = $var['attributes']['field_services']['processed'];
    //get the url for images
    $image = $var['relationships']['field_image']['links']['related']['href'];


    // fetch the second JSON file for image 
    $response = $client->get($image);
    $data = json_decode($response->getBody(), true);

    // extract the image URL from the second JSON file
    $images = $data['data']['attributes']['uri']['url'];?>

    <!-- div container for seperating every action -->
    <div class="inner_container">

    <!-- div container which contain image -->
    <div class="image_block"> 

    <!-- image tag containing images  -->
    <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $images;?>" alt="none" class="image">
    </div>

    <!-- div container containing heading, logo and list  -->
    <div class="content_block">
    <?php
    echo '<br>';

    // printing the heading
    echo $heading . "<br>";

    // fetch the second JSON file for logos
    $response = $client->get($logo);
    $data = json_decode($response->getBody(), true);

    // initializing array 
    $logoss = array();
    for($j=0; $j<count($data['data']); $j++){
      
      // url for logos 
      $logos = $data['data'][$j]['relationships']['thumbnail']['links']['related']['href'];

      //fetch the third json file for loops
      $response = $client->get($logos);
      $data_new = json_decode($response->getBody(), true);

      // get the logo
      $logo_url = $data_new['data']['attributes']['uri']['url'];
      
      // Check if the logo URL already exists in the array
      if (!array_key_exists($logo_url, $logoss)) {
        $logoss[$logo_url] = true; // Use the logo URL as the key and add it to the array
        ?>
        <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $logo_url ;?>" alt="none" class="logo">
        <?php
      }   
    }

    // printing the content
    echo  $content . "<br>"; 
    ?></div></div><?php 
    }
  }
}

// creating the object of class Action
$my_data = new Action($images, $heading, $content, $logoss);
//calling function fetching
$my_data->fetching();
?>