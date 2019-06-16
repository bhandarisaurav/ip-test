<?php

if (!isset($_POST['ip_private'])) {
    echo '<script type="text/javascript">window.location.href = "index.php";</script>"';
}
$ip_private = $_POST['ip_private'];
$ip_public = $_POST['ip_public'];

$ip_private_json_input = file_get_contents("ip_private.json");
$ip_private_array = json_decode($ip_private_json_input);
$ip_private_array = array_values(array_filter($ip_private_array));
//print_r($tempArray);
array_push($ip_private_array, $ip_private);
$ip_private_json_final = json_encode($ip_private_array);
file_put_contents('ip_private.json', $ip_private_json_final);


$ip_public_json_input = file_get_contents("ip_public.json");
$ip_public_array = json_decode($ip_public_json_input);
$ip_public_array = array_values(array_filter($ip_public_array));
//print_r($tempArray);
array_push($ip_public_array, $ip_public);
$ip_public_json_final = json_encode($ip_public_array);
file_put_contents('ip_public.json', $ip_public_json_final);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>IP Test</title>
</head>
<body>
<br>
<h1>GET IP Address of Your System</h1>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron">
                <h3 class="header">Your IP Address is: <span id="list"
                                                             style="color:#ffffff"><?php echo $ip_private; ?></span>
                </h3>
                <hr>
                <div>
                    <h4>List of all the Private IP Address <span class="btn btn-success text-bold"
                                                                 style=";margin-left: 23%; ">Download</span>
                    </h4>
                    <br>
                    <?php
                    echo '<ul class="custom-list star">';
                    foreach ($ip_private_array as $p) {
                        echo '<li>' . $p . '</li>';
                    }
                    echo '</ul>';
                    ?>
                </div>
            </div>
        </div>
        <!--        <div style="width: 10px;"></div>-->
        <div class="col-md-6">
            <div class="jumbotron">
                <h3 class="header">Your Public IP Address is: <span id="list"
                                                                    style="color:#ffffff"><?php echo $ip_public; ?></span>
                </h3>
                <hr>
                <div>
                    <h4>List of all the Private IP Address <span class="btn btn-success text-bold"
                                                                 style=";margin-left: 23%; ">Download</span></h4>
                    <br>
                    <?php
                    echo '<ul class="custom-list star">';
                    foreach ($ip_private_array as $p) {
                        echo '<li>' . $p . '</li>';
                    }
                    echo '</ul>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
