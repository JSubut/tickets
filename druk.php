<?php
//include("session.php");
$m = $_GET['m']; //маршрут
$p = $_GET['p']; //перевізник
$n = $_GET['n']; //номерний знак
$c = $_GET['c']; //напрям
?>
<!DOCTYPE html>
<html lang="uk-UA">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Квиток</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">

    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            &nbsp;
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col align-self-center btn-group-vertical">
            <a class="btn btn-success btn-lg" href="print.php?m=<?php echo $m; ?>&p=<?php echo $p; ?>&n=<?php echo $n; ?>&c=<?php echo $c; ?>" role="button" target="_blank"><input type="hidden" name="hidden_element" value="data"/>Друк</a><br>
            <!--            <div class="d-grid col-6 mx-auto">-->
            <!--                <button class="btn btn-secondary btn-lg" type="button" disabled>Додати до відомості</button><br>-->
            <!--            </div>-->
            <div class="d-grid col-6 mx-auto">
<!--                <a class="btn btn-danger" href="drivers.php?m=--><?php //echo $m; ?><!--&p=--><?php //echo $p; ?><!--&n=--><?php //echo $n; ?><!--" role="button"><input type="hidden" name="hidden_element" value="data"/>Закрити відомість</a><br><br>-->
            </div>
<!--            <a class="btn btn-primary" href="rout.php?p=--><?php //echo $p; ?><!--" role="button">Назад</a><br>-->
        </div>
    </div>
</div>
</body>
</html>
