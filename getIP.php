<?php

if (!isset($_POST['ip'])) {
    echo '<script type="text/javascript">window.location.href = "index.php";</script>"';
}
$data = $_POST['ip'];

$inp = file_get_contents("ip.json");
$tempArray = json_decode($inp);
$tempArray = array_values(array_filter($tempArray));
//print_r($tempArray);
array_push($tempArray, $data);
$jsonData = json_encode($tempArray);
file_put_contents('ip.json', $jsonData);

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
<h1 style="color: yellow; font-weight: bolder;letter-spacing: 3px;">GET IP Address of Your System</h1>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 jumbotron" style="max-width: 99%;">
            <h3 class="header">Your IP Address is: <span id="list" style="color:#ffffff"><?php echo $data ?></span></h3>
            <hr>
            <div>
                <p>List of all the Private IP Address</p>
                <?php
                echo '<ul class="custom-list star">';
                foreach ($tempArray as $p) {
                    echo '<li>' . $p . '</li>';
                }
                echo '</ul>';
                ?>
            </div>
        </div>
<!--        <div style="max-width: 1%;"></div>-->
        <div class="col-md-6 jumbotron" style="max-width: 99%;">
            <h3 class="header">Your Public IP Address is: <span id="list"
                                                                style="color:#ffffff"><?php echo $data ?></span></h3>
            <hr>
            <div>
                <p>List of all the Private IP Address</p>
                <?php
                echo '<ul class="custom-list star">';
                foreach ($tempArray as $p) {
                    echo '<li>' . $p . '</li>';
                }
                echo '</ul>';
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
