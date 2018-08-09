<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Send message</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        require 'vendor/autoload.php';
        const DEFAULT_URL = 'https://iot-smart-streetlight.firebaseio.com';
        const DEFAULT_PATH = '/';

        $firebase = new \Firebase\FirebaseLib(DEFAULT_URL);
        date_default_timezone_set("Asia/Kuala_Lumpur");
        ?>
        <div class="container">  
            <form id="contact" action="sendMessages.php" method="post">
                <h3>Add new Catalog form</h3>
                <h4>Insert all the fields</h4>
                <?php
                if ($_POST) {
                    $data = trim($_POST['message']);
                    $path = "messages/message";
                    $data2 = date("h:i:sa    d/m/Y");
                    $path2 = "messages/TimeDate";
                    $firebase->set($path, $data);
                    $firebase->set($path2, $data2);
                    echo '<p class="copyright" >Message:' . $data . ' sent successfully!</p>';
                }
                ?>
                <fieldset>
                    <p>Messages:</p>
                    <input placeholder="Message type here" type="text" name="message" tabindex="1" required autofocus>
                </fieldset>                
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit">Submit</button>
                </fieldset>                
            </form>
        </div>
    </body>
</html>
