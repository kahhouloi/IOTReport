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
        <?php
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $pickupDate = trim(date("Y-m-d"));
        if (isset($_POST['update'])) {
            $date2 = $_POST['bday'];
        } else {
            $date2 = $pickupDate;
        }
        echo"<h1>The Sensor Error Report for ".$date2.""
        ?>
        <form action="Sensor_report.php" method="post">
            <input type="date" name="bday">
            <button class="btn" type="submit" name="update">Check Error Today</button>
        </form>

        <table border="1">
            <tr>
                <th>Light Should be</th>
                <th>Error Datetime</th>
                <th>Light intensity</th>
                <th>Mac Address</th>

            </tr>
            <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $pickupDate = trim(date("Y-m-d"));
            if (isset($_POST['update'])) {
                $date2 = $_POST['bday'];
            } else {
                $date2 = $pickupDate;
            }
            foreach ($dataArray as $haha) {
                echo "<tr>";
                if ($haha['Error Date'] == $date2) {
                    $a = $haha['Light Should be'];
                    $b = $haha['Error Time'];
                    $c = $haha['Light intensity'];
                    $d = $haha['Mac Address'];
                    echo "<td>$a</td>";
                    echo "<td>$b</td>";
                    echo "<td>$c</td>";
                    echo "<td>$d</td>";
                    echo "</tr>";
                }
            }
            $count = 0;

            foreach ($dataArray as $haha2) {
                //$d = $haha['Error Date'];
                if ($haha2['Error Date'] == $date2) {
                    $count = $count + 1;
                }
            }
            echo "The error happended at ".$date2. " is " . $count;
            ?>
