<?php
session_start();

$username = $_SESSION['email'];
$password = $_POST['password'];
//var_dump($username);
//die();
switch ($username) {
    case 'admin@gmail.com':
//        $_SESSION['user'] = $username;
        header('Location: admin.php');
//            echo ('Користувач увійшов');
        break;
//    case 'Nadvirna':
//        $_SESSION['user'] = $username;
//        header('Location: drivers.php');
//        break;
//    case 2:
//        header('Location: index.php');
//        break;
    default:
        header('Location: user.php');
}
