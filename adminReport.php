<?php
#require 'C:\xampp\phpMyAdmin\vendor\autoload.php';
require 'vendor/autoload.php';

/* $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/my-project-58cab-firebase-adminsdk-dih9h-f48d859bde.json');
  $firebase = (new Factory)
  ->withServiceAccount($serviceAccount)
  ->create();

  $database = $firebase->getDatabase();

  $reference = $database->getReference('path/to/child/location');


  $value = $reference->getValue();

  print($value); */

const DEFAULT_URL = 'https://iot-smart-streetlight.firebaseio.com';
const DEFAULT_PATH = '/';

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL);


// --- storing a string ---
//$firebase->set(DEFAULT_PATH . '/name/contact001', "John Doe");
// --- reading the stored string ---
$data = $firebase->get(DEFAULT_PATH . '/Humidity');
$dataArray = json_decode($data, true);
$bindArray = array();

$new_array = array_values($dataArray);

foreach ($new_array as $index => $value) {
    #echo $dataArray [$index]['price'];
    if ($index % 2 == 0|| $index == 0) { // skip even members
        $tempArray = array("On" => $new_array[$index], "Off" => $new_array[$index + 1]);
        $bindArray[] = $tempArray;
    }
}

?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>TODO write content</div>
    </body>
</html>
