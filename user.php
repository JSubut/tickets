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
            <h4>Оберіть маршрут:</h4>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col align-self-center btn-group-vertical btn-group-lg">
            <?php
                $result = mysqli_query($conn, "SELECT * FROM crud");
                $name = 'Не знайдено';
                while($row = mysqli_fetch_array($result)) {
                    if ($name == $row["name"]) {
                        continue;
                    } else {
                        echo "<a class=\"btn btn-dark\" href=\"drivers.php?m=" . $row["name"] . "&p=" . $row["name"] . "\" role=\"button\">" . $row["name"] . "</a><br>";
                        $name = $row["name"];
                    }
                }
            ?>
        </div>
    </div>

</div>
</body>
</html>
