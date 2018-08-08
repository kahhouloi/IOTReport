<?php
require 'vendor/autoload.php';
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
    if ($index % 2 == 0 || $index == 0) { // skip even members
        $tempArray = array("On" => $new_array[$index], "Off" => $new_array[$index + 1]);
        $bindArray[] = $tempArray;
    }
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Humidity Report</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" onclick="logout()">
                            <i class="fa fa-user fa-fw"></i> Logout 
                        </a>
                    </li>
                </ul>

                <!-- /.navbar-static-side -->
            </nav>F

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div align="center">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onClick="document.location.href = 'some/page'">
                        Distress Call Report
                    </button>
                </span>
                </br>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onClick="document.location.href = 'humidityReport.php'">
                        Humidity Report
                    </button>
                </span>
                </br>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button"onClick="document.location.href = 'some/page'">
                        Light Intensity Report
                    </button>
                </span>
                </br>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onClick="document.location.href = 'some/page'">
                        Sensor Data Report
                    </button>
                </span>
            </div>

        </div>
        <!-- /#page-wrapper -->

        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
                        $(document).ready(function () {
                            $('#dataTables-example').DataTable({
                                responsive: true
                            });
                        });
        </script>

    </body>
</html>
