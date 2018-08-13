<?php
require 'vendor/autoload.php';



const DEFAULT_URL = 'https://iot-smart-streetlight.firebaseio.com';
const DEFAULT_PATH = '/';

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL);


// --- storing a string ---
$firebase->set(DEFAULT_PATH . '/name/contact001', "John Doe");

// --- reading the stored string ---
$name = $firebase->get(DEFAULT_PATH . '/Sensor Error');
$dataArray = json_decode($name, true); //convert to array
//print_r($dataArray);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Light Should be</th>
                <th>Error Datetime</th>
                <th>Light intensity</th>

            </tr>
            <?php
            foreach ($dataArray as $haha) {
                echo "<tr>";
                $a = $haha['Light Should be'];
                $b = $haha['Error Datetime'];
                $c = $haha['Light intensity'];
                echo "<td>$a</td>";
                echo "<td>$b</td>";
                echo "<td>$c</td>";
                echo "</tr>";
            }
            ?>
