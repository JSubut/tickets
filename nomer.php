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
            <h4>Оберіть номерний знак:</h4>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col align-self-center btn-group-vertical btn-group-lg">
            <?php
            $DB = new DB();
            $results = $DB->select(
                "SELECT * FROM `crud` WHERE `email` LIKE ?",
                ["%{$_GET['p']}%"]
            );

            $nomer = $results[-1]["phone"];

            for ($i=0; $results[$i]["phone"]; $i++){
                if ($nomer == $results[$i]["phone"]) {
                    continue;
                }else{
                    echo "<a class=\"btn btn-dark\" href=\"rout.php?m=" . $results[$i]["name"] . "&p=" . $results[$i]["email"] .  "&n=" . $results[$i]["phone"] ."\" role=\"button\">" . $results[$i]["phone"] . "</a><br>";
                    $nomer = $results[$i]["phone"];
                }
            }

//            $result = mysqli_query($conn, "SELECT * FROM crud");
//            $nomer = 'Не знайдено';
//            while($row = mysqli_fetch_array($result)) {
//                if ($nomer == $row["email"]) {
//                    continue;
//                } else {
//                    echo "<a class=\"btn btn-dark\" href=\"nomer.php?m=" . $row["name"] . "&p=" . $row["email"] . "\" role=\"button\">" . $row["email"] . "</a><br>";
//                    $nomer = $row["email"];
//                }
//            }
            ?>
        </div>
    </div>

</div>
</body>
</html>
