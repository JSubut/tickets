<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="uk-UA">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Квиток</title>
</head>
<body>
<div class="container-fluid">

    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            &nbsp;
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <h4>Оберіть зупинку:</h4>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col align-self-center btn-group-vertical btn-group-lg">
            <?php
            $DB = new DB();
            $results = $DB->select(
                "SELECT * FROM `crud` WHERE `phone` LIKE ?",
                ["%{$_GET['n']}%"]
            );
            $misto = $results[-1]["city"];

            for ($i=0; $results[$i]["city"]; $i++){
                if ($misto == $results[$i]["city"]) {
                    continue;
                }else{
                    echo "<a class=\"btn btn-dark\" href=\"druk.php?m=" . $results[$i]["name"] . "&p=" . $results[$i]["email"] .  "&n=" . $results[$i]["phone"] . "&c=" . $results[$i]["city"] ."\" role=\"button\">" . $results[$i]["city"] . "</a><br>";
                    $misto = $results[$i]["city"];
                }
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>
